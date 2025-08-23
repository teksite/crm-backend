<footer class="sticky bottom-0 -z-10 border border-zinc-300 py-3">
    <div class="text-center text-sm">
        <a href="https://teksite.net">developed by <span class="font-bold">TEKSITE</span></a>
    </div>
</footer>
<form action="{{route('auth.logout')}}" method="POST" id="logoutForm">
    @csrf
    @method('DELETE')
</form>
@if(session()->has('reply'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            toast: true,
            position: 'bottom-start',
            showConfirmButton: false,
            title: '{{session()->get('reply')['title'] ?? ''}}',
            text: '{{session()->get('reply')['message'] ?? ''}}',
            icon: '{{session()->get('reply')['type'] ?? ''}}',
            timer: 2000,
        });
    </script>
@endif
@stack('footerScripts')
