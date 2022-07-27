@extends('mlm.layouts.main')
@section('content')
<!-- Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

<!-- MobileMenu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay">
    </div>
    <!-- End of Overlay -->
    <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
    <!-- End of CloseButton -->
    <div class="mobile-menu-container scrollable">
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                placeholder="Search your keyword..." required />
            <button class="btn btn-search" type="submit">
                <i class="d-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <ul class="mobile-menu mmenu-anim">
            <li>
                <a href="{{url('/')}}">Home</a>
            </li>
            <li>
                <a href="{{url('about')}}">About</a>
            </li>
           
            <li>
                <a href="{{url('products')}}">Products</a>
                <ul>
                    <li><a href="{{url('products')}}">MQ Freckle Essence</a></li>
                    <li><a href="{{url('products')}}">MQ Anti-Blue Light Exquisite Spray</a></li>
                    <li><a href="{{url('products')}}">Coconut Oil Amino Acid Facial Cleanser</a></li>
                    <li><a href="{{url('products')}}">MQ Avocado Neckline Repair Message Cream</a></li>
                    <li><a href="{{url('products')}}">MQ Medical Mask</a></li>
                    
                </ul>
            </li>
          
         
            <li>
                <a href="{{url('contact')}}">Contact </a>
            </li>
            
        </ul>
    </div>
</div>

    <div style="width:100%; height:700px;" id="orgchart">
    </div>

    <div id="loder" style="display: none">
        @include('mlm.loder.index');
    </div>
@section('javascript')
    <script src="{{ asset('asset/tree/orgchart.js') }}"></script>
    <script>
	    OrgChart.templates.ana.link = '<path marker-start="url(#dotBlue)" marker-end="url(#arrow)"   stroke-linejoin="round" stroke="#aeaeae" stroke-width="1px" fill="none" d="M{xa},{ya} {xb},{yb} {xc},{yc} L{xd},{yd}" />';
        OrgChart.templates.ana.field_2 =
            '<text class="field_2"  style="font-size: 14px;" fill="#ffffff" x="10" y="83" >Sponsor By:{val}</text>';
        OrgChart.templates.ana.field_0 =
            '<text class="field_0"  style="font-size: 14px;" fill="#ffffff" x="10" y="100" >Name:{val}</text>';
        var chart = new OrgChart(document.getElementById("orgchart"), {
            nodeBinding: {
                field_0: "name",
                field_1: "title",
                img_0: "img",
                field_2: "direct_id",
            },
            template: "ana",
            mouseScrool: OrgChart.action.scroll,
            menu: {
                pdf: {
                    text: "Export PDF"
                },
                png: {
                    text: "Export PNG"
                },
                svg: {
                    text: "Export SVG"
                },
                csv: {
                    text: "Export CSV"
                }
            },
            nodeMenu: {
                pdf: {
                    text: "Export PDF"
                },
                png: {
                    text: "Export PNG"
                },
                svg: {
                    text: "Export SVG"
                }
            },
            tags: {
                "0": {
                    left: 0
                },
                "1": {
                    right: 1
                },
            },

        });

        $(document).ready(function() {
            $.ajax({
                url: "{{ URL::signedRoute('MLM.tree.create') }}",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#loder').show()
                },
                success: function(data) {
                    chart.load(data)
                    $('#loder').hide()
                }
            })
        })
    </script>
@endsection
@endsection
