<?php
// kết nối database 
    $servername = "localhost";
    $database = "shopgiaydep";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database, );
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
   
// -------------------------
function selectdata($sql)
{
    global $conn;
    $retval = mysqli_query(  $conn ,$sql);  
    return $retval;
}
// login 
function checklogin($email,$password){
    global $conn;
    $escaped_email = mysqli_real_escape_string($conn, $email);
    $escaped_password = mysqli_real_escape_string($conn, $password);
    $sql="SELECT * FROM khachhang WHERE Email = '$escaped_email' AND MatKhau = '$escaped_password'";
    $resulf=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($resulf);    
    if($count==0){
        return false;
      }else{
        return  mysqli_fetch_assoc($resulf);
      }     
}
// -------------------------
// ------------------------------------------ PRODUCT MODEL----------------------
// lấy danh sách sản phẩm
function productAll(){
  global $conn;
  $sql=" SELECT * FROM `sanpham`  limit 12" ;
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
}
// Lấy tất cả các size
function getAllSizes() {
    global $conn;
    $sql = "SELECT DISTINCT MaSize FROM chitietsanpham ORDER BY MaSize ASC";
    $result = mysqli_query($conn, $sql);
    $sizes = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $sizes[] = $row['MaSize'];
        }
    }
    return $sizes;
}

// Hàm lọc sản phẩm chính
function filterProducts($filters) {
    global $conn;
    $sql = "SELECT DISTINCT sp.* FROM sanpham sp 
            LEFT JOIN sanphamkhuyenmai spkm ON sp.MaSP = spkm.MaSP
            LEFT JOIN khuyenmai km ON spkm.MaKM = km.MaKM
            LEFT JOIN nhacc ncc ON sp.MaNCC = ncc.MaNCC";
    
    $params = array();
    $param_types = "";
    $where_clauses = array();

    // Lọc theo loại sản phẩm
    if (!empty($filters['product_type'])) {
        $where_clauses[] = "sp.MaDM = ?";
        $params[] = $filters['product_type'];
        $param_types .= "i";
    }

    // Lọc theo thương hiệu
    if (!empty($filters['brand'])) {
        $where_clauses[] = "ncc.TenNCC = ?";
        $params[] = $filters['brand'];
        $param_types .= "s";
    }

    // Lọc theo giới tính
    if (!empty($filters['gender'])) {
        $where_clauses[] = "sp.GioiTinh = ?";
        $params[] = $filters['gender'];
        $param_types .= "s";
    }

    // Lọc theo size
    if (!empty($filters['size'])) {
        $sql .= " LEFT JOIN chitietsanpham cts ON sp.MaSP = cts.MaSP";
        $where_clauses[] = "cts.MaSize = ?";
        $params[] = $filters['size'];
        $param_types .= "i";
    }

    // Lọc theo giá
    if (!empty($filters['min_price'])) {
        $where_clauses[] = "sp.DonGia >= ?";
        $params[] = $filters['min_price'];
        $param_types .= "d";
    }
    if (!empty($filters['max_price'])) {
        $where_clauses[] = "sp.DonGia <= ?";
        $params[] = $filters['max_price'];
        $param_types .= "d";
    }

    // Lọc sản phẩm khuyến mãi
    if (isset($filters['sale_only']) && $filters['sale_only']) {
        $where_clauses[] = "spkm.MaKM IS NOT NULL";
    }

    // Thêm mệnh đề WHERE nếu có điều kiện
    if (!empty($where_clauses)) {
        $sql .= " WHERE " . implode(" AND ", $where_clauses);
    }

    $sql .= " ORDER BY sp.MaSP DESC LIMIT 30"; 

    // Debug information
    error_log("SQL Query: " . $sql);
    error_log("Parameters: " . print_r($params, true));
    error_log("Param Types: " . $param_types);

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        error_log("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        return false;
    }

    if (!empty($param_types) && !empty($params)) {
        $bind_params = [];
        $bind_params[] = &$param_types;
        for ($i = 0; $i < count($params); $i++) {
            $bind_params[] = &$params[$i];
        }
        call_user_func_array([$stmt, 'bind_param'], $bind_params);
    }

    if (!$stmt->execute()) {
        error_log("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        return false;
    }

    $result = $stmt->get_result();
    
    // Debug number of results
    error_log("Number of results: " . $result->num_rows);
    
    return $result;
}
// lấy danh sách sản phẩn nổi bật 
function featuredProductsL4(){
  global $conn;
  $sql = "SELECT * FROM `sanpham` WHERE `MaDM` = 1 LIMIT 4";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
  if ($count == 0) {
      return false;
  } else {
      return $result;
  }
}
function newsProductsL4(){
  global $conn;
  $sql = "SELECT * FROM `sanpham` WHERE `MaDM` = 2 LIMIT 4 ";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
  if ($count == 0) {
      return false;
  } else {
      return $result;
  }
}
function sellingProductsL4(){
  global $conn;
  $sql = "SELECT * FROM `sanpham` WHERE `MaDM` = 3 LIMIT 4";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
  if ($count == 0) {
      return false;
  } else {
      return $result;
  }
}

// lấy danh sách sản phẩm random
function product_rand(){
  global $conn;
  $sql=" SELECT * FROM `sanpham` ORDER BY rand() limit 4" ;
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
}
// tìm kiếm sản phẩm 
function product_search($key){
  global $conn;
  $escaped_key = mysqli_real_escape_string($conn, $key);
  $sql="SELECT * FROM `sanpham` WHERE `TenSP` LIKE '%" . $escaped_key . "%' OR `MoTa` LIKE '%" . $escaped_key . "%'";
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
}
// lấy 1 product 
function product($id){
  global $conn;
  $sql="SELECT * FROM sanpham WHERE `MaSP` = $id";
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
}
// tính sản phẩm khuyến mãi
function price_sale($id,$gia){
  global $conn;
  $a=0; $b=0;$tong=0;
  date_default_timezone_set('Asia/Ho_Chi_Minh');$date=getdate();
	$ngay=$date['year']."-".$date['mon']."-".($date['mday']);
 
  $km="SELECT * FROM `sanphamkhuyenmai` WHERE `MaSP`=".$id;
  $query_km=mysqli_query($conn,$km);
  while ($kq_km=mysqli_fetch_array($query_km)) {
    $km1="SELECT * FROM `khuyenmai` WHERE `MaKM`=".$kq_km['MaKM']." and NgayBD <='".$ngay."' and NgayKT >='".$ngay."'";
      $query_km1=mysqli_query($conn,$km1);
      while ($kq_km=mysqli_fetch_array($query_km1)) { 
           if(isset($kq_km['KM_PT'])){ $b=$b+($kq_km['KM_PT']);} 
           if(isset($kq_km['TienKM'])){ $a=$a+($kq_km['TienKM']);} 				            	
      }	
  }
  if ($a!==0 && $b!==0) {
    return  $tong = $gia - $a - ($gia*$b/100);
  }elseif($b==0){
    return $tong=$gia-$a;
  }elseif($a==0){
    return $tong=$gia-($gia*$b/100);
  }else{
    return $gia;
  }
}
// lấy  product detail
function product_detail_color($id){
  global $conn;
  $sql="SELECT  DISTINCT MaMau FROM `chitietsanpham` WHERE  `MaSP` = $id";
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
}
function product_detail_size($id){
  global $conn;
  $sql="SELECT  DISTINCT MaSize FROM `chitietsanpham` WHERE  `MaSP` = $id";
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
}
function product_detail_image($id){
  global $conn;
  $sql="SELECT  * FROM `anhsp` WHERE  `MaSP` = $id";
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
}
// check số lượgn prodcut
function check_product_soluong($id,$size,$mau){
  global $conn;
  $sql="select SoLuong from chitietsanpham where MaSP=".$id." and MaMau='".$mau."' and MaSize=".$size;
  $resulf = mysqli_query($conn ,$sql);  
  $count=mysqli_num_rows($resulf);        
  if($count==0){
    return $soluongkho=0;
  }else{
    $soluongkho=mysqli_fetch_array($resulf);
    return  $soluongkho['SoLuong'];
  }     
}
// check phiếu giảm giá
if (isset($_POST["functionName"])) {
  if ($_POST["functionName"] == "check_coupon") {
    $id = $_POST["id"];
    $result = check_coupon($id);
    echo json_encode($result);
  }
}
function check_coupon($id){
  global $conn;
  $sql="SELECT * FROM `phieugiamgia` WHERE `id` = '$id'";
  $resulf = mysqli_query($conn ,$sql);  
  $count=mysqli_num_rows($resulf);        
  if($count==0){
    return $coupon=0;
  }else{
    $coupon=mysqli_fetch_array($resulf);
    return number_format( $coupon['SoTien']);
  }     
}
// các bình luận product
function product_review($id){
  global $conn;
  $sql="SELECT * FROM `binhluan` WHERE `MaSP`=$id ORDER BY ThoiGian DESC ";
  $resulf = mysqli_query($conn ,$sql);       
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
}
// thêm bình luận product
function product_addtoreview($masp,$id,$nd){
  global $conn;
  $sql="INSERT INTO `binhluan`( `MaSP`, `MaKH`, `NoiDung`) VALUES('$masp',".$id.",'$nd')";
  $resulf = mysqli_query($conn ,$sql);  
  if($resulf){
      return true;
    }else{
      return  false;
    }     
}
/////// tải thêm nhiều sản phẩm với ajax
if (isset($_POST['page'])==true) {
  $page = $_POST['page']*12;
  $row_count = $_POST['rowCount'];
  $sql="SELECT * FROM `sanpham`  limit 12,".$page;
  $res=selectdata($sql); ?>
  <div class="row pad-dt"><?php  while( $row=mysqli_fetch_array($res)){ ?>
    <div class="col-3 col-dt">
      <a href="?view=product-detail&id=<?php echo $row['MaSP'] ?>">
        <div class="item">
          <div class="product-lable">
            <?php $price_sale=price_sale($row['MaSP'],$row['DonGia']); if($price_sale < $row['DonGia']) { 
              echo '<span>Giảm '.number_format( $row['DonGia'] - $price_sale).'đ </span>';}?>
          </div>
          <div><img src="webroot/image/sanpham/<?php echo $row['AnhNen']; ?>"></div>
          <div class="item-name"><p> <?php echo $row['TenSP']; ?> </p></div>
          <div class="item-price">
            <p> <?php echo number_format($price_sale,0).'đ'; ?> </p>
            <h6> <?php if(number_format($row['DonGia']) !== number_format($price_sale)) {echo number_format($row['DonGia']).'đ';} ;  ?> </h6> 
          </div>
        </div>
      </a>
      </div><?php }  ?>
  </div>
<?php
};


// ------------------------------------------ Category MODEL----------------------
// danh mục 
function categorys(){
  global $conn;
  $sql=" SELECT * FROM `nhacc` ";
  $resulf=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($resulf);    
    if($count==0){
        return false;
      }else{
        return  $resulf;
      }     
}
// lấy danh sách sản phẩm theo danh mục
function product_category($id){
  global $conn;
  $sql=" SELECT * FROM `sanpham` where MaNCC = $id" ;
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
}

// -------------------------------------------------------------------------------
// ------------------------------------------ card MODEL----------------------
// xử lý đặt hàng

function insert_nguoinhan($tennn, $diachi, $sdt, $makh) {
    global $conn;
    
    try {
        // Tạo đơn hàng tạm thời để lấy MaHD
        $sql = "INSERT INTO hoadon (MaKH, TinhTrang) 
                VALUES ($makh, 'chưa duyệt')";
        $result = mysqli_query($conn, $sql);
        
        if (!$result) {
            throw new Exception("Lỗi tạo đơn hàng: " . mysqli_error($conn));
        }
        
        $mahd = mysqli_insert_id($conn);
        
        // Thêm thông tin người nhận
        $sql = "INSERT INTO nguoinhan (MaHD, TenNN, DiaChiNN, SDTNN) 
                VALUES ($mahd, '$tennn', '$diachi', $sdt)";
        $result = mysqli_query($conn, $sql);
        
        if (!$result) {
            throw new Exception("Lỗi thêm thông tin người nhận: " . mysqli_error($conn));
        }
        
        return $mahd;
        
    } catch (Exception $e) {
        error_log("Lỗi thêm người nhận: " . $e->getMessage());
        return false;
    }
}

function order_product($tennn, $diachi, $sdt, $makh, $tt, $payment, $id_nguoinhan) {
    global $conn;
    
    // Bắt đầu transaction
    mysqli_begin_transaction($conn);
    
    try {
        // Kiểm tra số lượng sản phẩm
        foreach ($_SESSION['cart'] as $item) {
            $masp = $item['id'];
            $sl = $item['quantity'];
            $size = $item['size'];
            $mamau = $item['color'];
            
            $sql = "SELECT SoLuong FROM chitietsanpham 
                    WHERE MaSP = $masp 
                    AND MaSize = $size 
                    AND MaMau = '$mamau'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            
            if (!$row || $row['SoLuong'] < $sl) {
                throw new Exception("Sản phẩm không đủ số lượng trong kho");
            }
        }
        
        // Lấy thông tin voucher nếu có
        $voucher_code = isset($_SESSION['voucher']['code']) ? $_SESSION['voucher']['code'] : null;
        $discount = isset($_SESSION['voucher']['discount']) ? $_SESSION['voucher']['discount'] : 0;
        
        // Cập nhật thông tin đơn hàng
        $sql = "UPDATE hoadon 
                SET TongTien = " . ($tt - $discount) . ", 
                    PhuongThucThanhToan = '$payment',
                    MaGiamGia = " . ($voucher_code ? "'$voucher_code'" : "NULL") . ",
                    TienGiam = $discount
                WHERE MaHD = $id_nguoinhan";
        $result = mysqli_query($conn, $sql);
        
        if (!$result) {
            throw new Exception("Lỗi cập nhật đơn hàng: " . mysqli_error($conn));
        }
        
        // Lưu chi tiết đơn hàng
        foreach ($_SESSION['cart'] as $item) {
            $masp = $item['id'];
            $sl = $item['quantity'];
            $dg = $item['price'];
            $size = $item['size'];
            $mamau = $item['color'];
            $ttt = $sl * $dg;
            
            // Thêm chi tiết đơn hàng
            $sql = "INSERT INTO chitiethoadon (MaHD, MaSP, SoLuong, DonGia, ThanhTien, Size, MaMau) 
                    VALUES ($id_nguoinhan, $masp, $sl, $dg, $ttt, $size, '$mamau')";
            $result = mysqli_query($conn, $sql);
            
            if (!$result) {
                throw new Exception("Lỗi thêm chi tiết đơn hàng: " . mysqli_error($conn));
            }
            
            // Cập nhật số lượng sản phẩm
            $sql = "UPDATE chitietsanpham 
                    SET SoLuong = SoLuong - $sl 
                    WHERE MaSP = $masp 
                    AND MaSize = $size 
                    AND MaMau = '$mamau'";
            $result = mysqli_query($conn, $sql);
            
            if (!$result) {
                throw new Exception("Lỗi cập nhật số lượng sản phẩm: " . mysqli_error($conn));
            }
        }
        
        // Commit transaction
        mysqli_commit($conn);
        return true;
        
    } catch (Exception $e) {
        // Rollback nếu có lỗi
        mysqli_rollback($conn);
        error_log("Lỗi đặt hàng: " . $e->getMessage());
        return false;
    }
}
// -------------------------------------------------------------------------------
// ------------------------------------------ user MODEL----------------------
// đăng ký mới
function newUser($name,$email,$sdt,$address,$password){
  global $conn;
  $sql="INSERT INTO `khachhang`( `TenKH`, `Email`, `SDT`, `DiaChi`, `MatKhau`) VALUES ('$name','$email','$sdt','$address','$password')";
  $resulf=mysqli_query($conn,$sql);
  if($resulf){
      return true;
    }else{
      return false;
    }     
}
// -------------------------
// select khách hàng
function selectKH($id){
  global $conn;
  $sql="SELECT * FROM khachhang WHERE MaKH = $id";
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf); 
  if($count==0){
      return false;
    }else{
      return mysqli_fetch_array($resulf);
    }     
}
// -------------------------

// update khách hàng
function update_user($id,$ten,$sdt,$dc,$matkhau){
  global $conn;
  $sql="UPDATE `khachhang` SET `TenKH`='$ten',`SDT`=$sdt,`DiaChi`='$dc',`MatKhau`='$matkhau' WHERE `MaKH`=$id";
  $resulf=mysqli_query($conn,$sql);
  return $resulf;
}
// -------------------------
// đơn hàng của khách hàng
function bill_user($id){
  global $conn;
  $sql="SELECT * FROM `hoadon` WHERE MaKH = $id ORDER BY NgayDat DESC";
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf); 
  if($count==0){
      return false;
    }else{
      return $resulf;
    }     
}
// -------------------------------------------------------------------------------
// ------------------------------------------ admin  ----------------------
// chi tiết hóa đơn
function bill_detail($id){
  global $conn;
  $sql="SELECT * FROM chitiethoadon WHERE MaHD = $id" ;
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf); 
  if($count==0){
      return false;
    }else{
      return $resulf;
    }     
}

// -------------------------------------------------------------------------------

?>



