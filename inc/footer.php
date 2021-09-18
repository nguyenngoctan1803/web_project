</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Thông tin</h4>
						<ul>
							<li>Công ty Cổ Phần Bookstore</li>
							<li>Địa chỉ đăng ký kinh doanh: 29/1, đường số 4, KP.3, P. Bình Khánh, Q.2, TPHCM, Việt Nam</li>
							<li>Mã số doanh nghiệp: 0106773786 do Sở Kế hoạch & Đầu tư TP Hồ Chí Minh cấp lần đầu ngày 10/02/2015</li>
							<li>- Văn phòng chính: Tòa nhà Viettel, 285 Cách Mạng Tháng 8, Phường 12, Quận 10, Thành phố Hồ Chí Minh. <br>- Văn phòng: 52 Út Tịch, Phường 4, Quận Tân Bình, Thành Phố Hồ Chí Minh.</li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Về Bookstore</h4>
						<ul>
							<li><a href="about.php">Giới thiệu Bookstore</a></li>
							<li><a href="contact.php">Điều khoản sử dụng</a></li>
							<li><a href="contact">Chính sách bảo mật</a></li>
							<li><a href="contact.php"><span>Chính sách giải quyết khiếu nại</span></a></li>
							<li><a href="contact.php"><span>Chính sách bảo mật thanh toán</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Tài khoản của tôi</h4>
						<ul>
							<li><a href="login.php">Đăng kí</a></li>
							<li><a href="cart.php">Xem giỏ hàng</a></li>
							<li><a href="wishlist.php">Sản phẩm yêu thích</a></li>
							<li><a href="profile.php">Chi tiết tài khoản</a></li>
							<li><a href="contact.php">Liên hệ</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Hỗ trợ</h4>
						<ul>
							<li>Tổng đài hỗ trợ: 19001221</li>
							<li>Đối tác có nhu cầu hợp tác quảng cáo hoặc kinh doanh: marketing@bookstore.vn</li>
						</ul>
						<div class="social-icons">
							<h4>KẾT NỐI VỚI CHÚNG TÔI</h4>
					   		  <ul>
							      <li class="facebook"><a href="#" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p>© 2021 Bookstore. Tất cả các quyền được bảo lưu. </p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>
