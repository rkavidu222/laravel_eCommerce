<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')

    <style>
        /* === General Body === */
        body {
            background-color: #121212;
            color: #fff;
            font-family: "Poppins", sans-serif;
        }

        .content-wrapper {
            padding-top: 10px !important;
            margin-top: 0 !important;
        }

        .div_center {
            text-align: center;
            padding: 20px 0 25px;
        }

        .h2_font {
            font-size: 38px;
            font-weight: 600;
            color: #b08cff;
            margin: 0;
            padding-top: 10px;
            padding-bottom: 15px;
        }

        /* === Input Fields === */
        .input_color {
            background: #1f1f1f;
            color: #fff;
            padding: 12px;
            width: 350px;
            border: 1px solid #7c5af4;
            border-radius: 8px;
            transition: 0.3s ease;
        }

        .input_color:focus {
            border-color: #a18cff;
            box-shadow: 0 0 6px #a18cff;
            outline: none;
        }

        /* === Buttons === */
        .btn-primary {
            background-color: #7c5af4;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            margin-left: 10px;
            transition: 0.3s ease;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #a18cff;
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: #ff6b6b;
            border: none;
            border-radius: 6px;
            padding: 6px 12px;
            transition: 0.3s;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #ff8787;
        }

        /* === Table === */
        .table-container {
            width: 80%;
            margin: 20px auto 40px;
            overflow-x: auto;
            background-color: #1e1e2f;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(176, 140, 255, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        th {
            background-color: #8e63e8;
            color: #fff;
            text-transform: uppercase;
            font-weight: 500;
        }

        tr:hover {
            background-color: rgba(142,99,232,0.1);
        }

        /* === Toast Notification === */
        .toast-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            min-width: 300px;
            padding: 16px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
            z-index: 2000;
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.5s ease;
        }

        .toast-success {
            background-color: #28a745;
            border-left: 5px solid #1c7c31;
        }

        .toast-error {
            background-color: #dc3545;
            border-left: 5px solid #a71d2a;
        }

        .toast-message {
            flex-grow: 1;
            margin-left: 10px;
        }

        .toast-close {
            background: none;
            border: none;
            color: #fff;
            font-size: 20px;
            cursor: pointer;
        }

        /* Slide-in animation */
        .toast-show {
            opacity: 1;
            transform: translateX(0);
        }
    </style>
</head>

<body>
<div class="container-scroller">
    @include('admin.sidebar')

    <div class="container-fluid page-body-wrapper">
        @include('admin.navbar')

        <div class="main-panel">
            <div class="content-wrapper">

                {{-- Toast Notifications --}}
                @if(session('success'))
                    <div class="toast-notification toast-success">
                        <div class="toast-message">{{ session('success') }}</div>
                        <button class="toast-close" onclick="this.parentElement.remove()">&times;</button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="toast-notification toast-error">
                        <div class="toast-message">{{ session('error') }}</div>
                        <button class="toast-close" onclick="this.parentElement.remove()">&times;</button>
                    </div>
                @endif

                {{-- Add Category Form --}}
                <div class="div_center">
                    <h2 class="h2_font">Add Category</h2>
                    <form action="{{ url('/add_category') }}" method="POST">
                        @csrf
                        <input class="input_color" type="text" name="category_name" placeholder="Write category name" required>
                        <input type="submit" class="btn btn-primary" value="Add Category">
                    </form>
                </div>

                {{-- Category Table --}}
                <div class="table-container">
                    <table>
                        <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $category)
                            <tr>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="{{ url('/delete_category/'.$category->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

            @include('admin.footer')
        </div>
    </div>
</div>

@include('admin.scripts')

<script>
    // Show toast notifications
    document.addEventListener('DOMContentLoaded', () => {
        const toasts = document.querySelectorAll('.toast-notification');
        toasts.forEach(toast => {
            // Slide in
            toast.classList.add('toast-show');

            // Auto hide after 3 seconds
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                setTimeout(() => toast.remove(), 500);
            }, 3000);
        });
    });
</script>

</body>
</html>
