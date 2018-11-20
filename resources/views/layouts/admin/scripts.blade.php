    <script src="{{ url('/resources/assets/third-party/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('/resources/assets/third-party/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/resources/assets/third-party/plugins/iCheck/icheck.min.js') }}"></script>


    <script src="{{ url('/') }}/resources/assets/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/resources/assets/js/dataTables.bootstrap.min.js"></script>

    <script src="{{ url('/') }}/resources/assets/js/fastclick.js"></script>
    <script src="{{ url('/') }}/resources/assets/js/adminlte.min.js"></script>
    <script src="{{ url('/') }}/resources/assets/js/dashboard2.js"></script>
    <script src="{{ url('/') }}/resources/assets/js/demo.js"></script>
    <script>
        var AdminUrl = "{{ url("/admin")}}";
        var ProjectUrl = "{{url("/")}}";
    </script>

    <script src="{{ url('/') }}/resources/assets/index.js"></script>

    @yield("head-javascript")
