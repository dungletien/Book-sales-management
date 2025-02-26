# Hệ thống quản lý Bán Sác

## Giới thiệu  
Hệ thống Quản lý Bán Sách được xây dựng trên nền tảng Laravel, nhằm hỗ trợ quản lý sách, đơn hàng và doanh thu một cách hiệu quả, giúp tối ưu hóa hoạt động của cửa hàng sách.

## Công nghệ sử dụng  
- **Laravel**: Framework PHP mạnh mẽ, linh hoạt, sử dụng cấu trúc MVC rõ ràng để phát triển ứng dụng web nhanh chóng.  
- **MySQL**: Hệ quản trị cơ sở dữ liệu quan hệ phổ biến, dễ sử dụng, hiệu suất cao.  
- **HTML/CSS/JavaScript**: Công nghệ front-end để xây dựng giao diện người dùng thân thiện.  
- **Blade**: Template engine của Laravel, hỗ trợ tạo giao diện động và tái sử dụng.  

## Chức năng chính  
- **Quản lý Sách**: Thêm, sửa, xóa và xem danh sách sách.  
- **Quản lý Đơn hàng**: Tạo, chỉnh sửa, xóa và quản lý danh sách đơn hàng.  
- **Doanh thu**: Hiển thị tổng doanh thu từ các đơn hàng

## UML
![image](https://github.com/user-attachments/assets/3b4291f6-4c61-47a6-9190-c3700d64635f)

![image](https://github.com/user-attachments/assets/a23c6d34-f947-43b9-979d-56ed7f486659)

## Hướng dẫn cài đặt  
Sau khi tải file về, thực hiện các bước sau:  
1. Cài đặt thư viện: `composer install`  
2. Đổi tên file `.env.example` thành `.env`  
3. Tạo khóa ứng dụng: `php artisan key:generate`  
4. Khởi chạy hệ thống: `php artisan serve`
