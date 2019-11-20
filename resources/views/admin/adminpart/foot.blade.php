<!-- Jquery Core Js --> 
@section('admin_jscript')
<script src="{{ $assets_admin }}/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="{{ $assets_admin }}/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="{{ $assets_admin }}/plugins/jquery-validation/jquery.validate.js"></script>
<script src="{{ $assets_admin }}/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="{{ $assets_admin }}/bundles/knob.bundle.js"></script> <!-- Jquery Knob Plugin Js -->
<script src="{{ $assets_admin }}/js/pages/charts/jquery-knob.min.js"></script>
<script src="{{ $assets_admin }}/js/pages/index.js"></script>
@show
</body>
</html>