title Sequence Khách Hàng


fontawesome5regular f007 Khách hàng
fontawesome5regular f2d0 VueJS
fontawesome f233 Laravel
fontawesome f1c0 MySQL
fontawesome f0ae RabbitMQ

abox right of Laravel #yellow:TRY
note over Khách hàng #yellow: Truy cập

Khách hàng->VueJS: Truy cập website
VueJS->Laravel: Lấy dữ liệu hiển thị trang chủ
Laravel->MySQL: Lấy danh sách sản phẩm top, mới
MySQL-->Laravel: Danh sách sản phẩm
Laravel-->VueJS: Dữ liệu json
VueJS-->Khách hàng: Hiển thị giao diện

note over Khách hàng #yellow: Xem danh sách sản phẩm
Khách hàng->VueJS: Truy cập xem danh sách sản phẩm
VueJS->Laravel: Yêu cầu lấy dữ liệu danh sách sản phẩm
Laravel->MySQL: Truy vấn lấy danh sách sản phẩm \ntheo sản phẩm mới nhất
MySQL-->Laravel: Danh sách sản phẩm
Laravel-->VueJS: Dữ liệu json
VueJS-->Khách hàng: Hiển thị giao diện

note over Khách hàng #yellow: Đăng ký tài khoản

Khách hàng->VueJS: Thông tin đăng ký tài khoản
VueJS->VueJS: Validate dữ liệu hợp lệ
VueJS->Laravel: Thông tin đăng ký
Laravel->MySQL: Thêm dữ liệu vào trong CSDL
MySQL-->Laravel: Thêm dữ liệu thành công
Laravel-->VueJS: Đăng ký tài khoản thành công
VueJS-->Khách hàng: chuyển hướng đến trang xác nhận tài khoản
Khách hàng->VueJS: Nhập vào mã xác thực
VueJS->Laravel: Yêu cầu kiểm tra mã xác thực
Laravel->MySQL: Kiểm tra mã xác thực có đúng chưa
MySQL-->Laravel: Phản hồi lại mã xác thực 
rbox left of Laravel: <color #red>IF không hợp lệ
Laravel--#red>VueJS: <color #red> Trả về message lỗi
VueJS--#red>Khách hàng: <color #red> Hiển thị mesage lỗi
rbox right of Laravel: <color #green>IF OK
Laravel--#green>VueJS: <color #green>Xác thực thành công
VueJS-->Khách hàng: Chuyển đến trang đăng nhập

note over Khách hàng #yellow: Thêm sản phẩm vào giỏ hàng

Khách hàng->VueJS: Bấm nút thêm giỏ hàng
VueJS->Laravel: Thông tin sản phẩm, khách hàng

abox right of Laravel #steelblue: <color #white>CATCH
