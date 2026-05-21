# Numa Vietnam Travel

Website WordPress + WooCommerce dành cho booking tour du lịch.

## Thành phần đã tạo

- `docker-compose.yml` với MySQL, WordPress và WP-CLI
- `wp-content/themes/numa-travel` theme tùy chỉnh
- `setup.sh` script cài đặt tự động

## Khởi động

1. Chạy:

```bash
bash setup.sh
```

2. Mở:

```text
http://localhost:8080
```

3. Đăng nhập bằng:

- Username: `admin`
- Password: `Admin123!`

## Ghi chú

- Theme hiện tại: `numa-travel`
- Shortcut tour: `[numa_tour_list count="6" category="tour"]`
- WooCommerce được cài và kích hoạt tự động
