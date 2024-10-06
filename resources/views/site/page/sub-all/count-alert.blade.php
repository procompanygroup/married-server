@if (session('error'))
            var errorMsg='{{ session('error') }}';
            swal(errorMsg);        
             @endif