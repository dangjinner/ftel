<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Khách Hàng Đăng Ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #0056b3;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            text-align: left;
            padding: 8px 12px;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #f4f4f4;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
            font-size: 12px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Thông Tin Khách Hàng Đăng Ký</h1>
    <p>Kính gửi: {{ $affiliateAccount->full_name }},</p>
    <p>Chúng tôi xin thông báo rằng khách hàng dưới đây đã đăng ký thông qua website <a href="https://ftel.vn" target="_blank">https://ftel.vn</a>:</p>
    <table>
        <tr>
            <th>Họ và tên</th>
            <td>{{ $affiliateCustomer->name }}</td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td>{{ $affiliateCustomer->phone_number }}</td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td>{{ $affiliateCustomer->address }}</td>
        </tr>
        <tr>
            <th>Ngày đăng ký</th>
            <td>{{ $affiliateCustomer->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
            <th>Gói dịch vụ</th>
            <td>{{ $affiliateCustomer->service_option }}</td>
        </tr>
        <tr>
            <th>Ghi chú</th>
            <td>{{ $affiliateCustomer->note }}</td>
        </tr>
    </table>
    <p>Quý đại lý vui lòng theo dõi và liên hệ hỗ trợ khách hàng trong thời gian sớm nhất.</p>
    <p>Trân trọng,<br>Đội ngũ FTel</p>
    <div class="footer">
        &copy; {{ date('Y') }} FPT Telecom
    </div>
</div>
</body>
</html>
