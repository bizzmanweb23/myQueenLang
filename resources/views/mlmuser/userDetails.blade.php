
@extends('frontend.layouts.masters')
@section('title','Myqueen | User Details')
@section('body')
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
                    <a href="index.html">@lang('auth.home')</a>
                </li>
                <li>
                    <a href="about-us.html">@lang('auth.About')</a>
                </li>
               
                <li>
                    <a href="#">@lang('auth.Products')</a>
                    <ul>
                        <li><a href="{{url('products')}}">@lang('auth.product name1')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name2')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name3')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name4')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name5')</a></li>
                        
                    </ul>
                </li>
              
             
                <li>
                    <a href="contact-us.html">@lang('auth.Contact') </a>
                </li>
                
            </ul>
    </div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<main class="main account">
    <img src="images/Member-registration.jpg" alt="" class="img-fluid" style="width:100%">
    <div class="container">
        <form action="{{route('Store-User-Details')}}" method="post">
            @csrf
             <html lang="en">
            <head>
            <meta charset="utf-8">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
            <script src="//geodata.solutions/includes/countrystatecity.js"></script>
            </head>
            <body>            
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <label> @lang('user.Branch') *</label>
                    <select name="branch_id" class="form-control">
                        <option value="singapore" selected="">Singapore</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>@lang('user.Sponser Id')</label>
                    <input type="text" class="form-control" id="sponser_id" name="sponser_id" value="{{$matched_data->user_id}}" readonly>
                </div>
                <div class="col-md-3">
                    <label>@lang('user.Referal Code')</label>
                    <input type="text" class="form-control" name="referal_code" value="{{$user->referal_code}}" readonly>
                </div>
                <div class="col-md-3">
                    <label>@lang('user.Email Id')</label>
                    <input type="email" class="form-control" name="email_id">
                </div>
            </div>
            <br>
            <div class="row">
                
                <div class="col-md-3">
                    <label>@lang('user.Contact address')*</label>
                    <textarea name="contact_address" id="" cols="30" rows="10" style="height: 45px;" required></textarea>
                </div>
                 <div class="col-md-3">
                    <label>@lang('user.Country')*</label>
                    <select name="country" class="countries form-control" id="countryId">
                    <option value="">Select</option></br></br>
                </select>                             
                </div>
                <div class="col-md-3">
                    <label>@lang('user.State')*</label>
                    <select name="state" class="states form-control" id="stateId">
                    <option value="">@lang('user.Select State')</option> </br></br>   
               </select>                    
                </div>              
                <div class="col-md-3">
                    <label>@lang('user.Postcode')*</label>
                    <input type="text" class="form-control" name="postcode" required>
                </div>            
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label>@lang('user.Mobile No')*</label>
                    <input type="number" class="form-control" name="mobile_no" required>
                </div> 
                <div class="col-md-3">
                    <label>@lang('user.Nationality') *</label>
                    <select name="nationality" class="form-control">
                        <option value="">Select</option>
                        <option value="afghan">Afghan</option>
                        <option value="albanian">Albanian</option>
                        <option value="algerian">Algerian</option>
  <option value="american">American</option>
  <option value="andorran">Andorran</option>
  <option value="angolan">Angolan</option>
  <option value="antiguans">Antiguans</option>
  <option value="argentinean">Argentinean</option>
  <option value="armenian">Armenian</option>
  <option value="australian">Australian</option>
  <option value="austrian">Austrian</option>
  <option value="azerbaijani">Azerbaijani</option>
  <option value="bahamian">Bahamian</option>
  <option value="bahraini">Bahraini</option>
  <option value="bangladeshi">Bangladeshi</option>
  <option value="barbadian">Barbadian</option>
  <option value="barbudans">Barbudans</option>
  <option value="batswana">Batswana</option>
  <option value="belarusian">Belarusian</option>
  <option value="belgian">Belgian</option>
  <option value="belizean">Belizean</option>
  <option value="beninese">Beninese</option>
  <option value="bhutanese">Bhutanese</option>
  <option value="bolivian">Bolivian</option>
  <option value="bosnian">Bosnian</option>
  <option value="brazilian">Brazilian</option>
  <option value="british">British</option>
  <option value="bruneian">Bruneian</option>
  <option value="bulgarian">Bulgarian</option>
  <option value="burkinabe">Burkinabe</option>
  <option value="burmese">Burmese</option>
  <option value="burundian">Burundian</option>
  <option value="cambodian">Cambodian</option>
  <option value="cameroonian">Cameroonian</option>
  <option value="canadian">Canadian</option>
  <option value="cape verdean">Cape Verdean</option>
  <option value="central african">Central African</option>
  <option value="chadian">Chadian</option>
  <option value="chilean">Chilean</option>
  <option value="chinese">Chinese</option>
  <option value="colombian">Colombian</option>
  <option value="comoran">Comoran</option>
  <option value="congolese">Congolese</option>
  <option value="costa rican">Costa Rican</option>
  <option value="croatian">Croatian</option>
  <option value="cuban">Cuban</option>
  <option value="cypriot">Cypriot</option>
  <option value="czech">Czech</option>
  <option value="danish">Danish</option>
  <option value="djibouti">Djibouti</option>
  <option value="dominican">Dominican</option>
  <option value="dutch">Dutch</option>
  <option value="east timorese">East Timorese</option>
  <option value="ecuadorean">Ecuadorean</option>
  <option value="egyptian">Egyptian</option>
  <option value="emirian">Emirian</option>
  <option value="equatorial guinean">Equatorial Guinean</option>
  <option value="eritrean">Eritrean</option>
  <option value="estonian">Estonian</option>
  <option value="ethiopian">Ethiopian</option>
  <option value="fijian">Fijian</option>
  <option value="filipino">Filipino</option>
  <option value="finnish">Finnish</option>
  <option value="french">French</option>
  <option value="gabonese">Gabonese</option>
  <option value="gambian">Gambian</option>
  <option value="georgian">Georgian</option>
  <option value="german">German</option>
  <option value="ghanaian">Ghanaian</option>
  <option value="greek">Greek</option>
  <option value="grenadian">Grenadian</option>
  <option value="guatemalan">Guatemalan</option>
  <option value="guinea-bissauan">Guinea-Bissauan</option>
  <option value="guinean">Guinean</option>
  <option value="guyanese">Guyanese</option>
  <option value="haitian">Haitian</option>
  <option value="herzegovinian">Herzegovinian</option>
  <option value="honduran">Honduran</option>
  <option value="hungarian">Hungarian</option>
  <option value="icelander">Icelander</option>
  <option value="indian">Indian</option>
  <option value="indonesian">Indonesian</option>
  <option value="iranian">Iranian</option>
  <option value="iraqi">Iraqi</option>
  <option value="irish">Irish</option>
  <option value="israeli">Israeli</option>
  <option value="italian">Italian</option>
  <option value="ivorian">Ivorian</option>
  <option value="jamaican">Jamaican</option>
  <option value="japanese">Japanese</option>
  <option value="jordanian">Jordanian</option>
  <option value="kazakhstani">Kazakhstani</option>
  <option value="kenyan">Kenyan</option>
  <option value="kittian and nevisian">Kittian and Nevisian</option>
  <option value="kuwaiti">Kuwaiti</option>
  <option value="kyrgyz">Kyrgyz</option>
  <option value="laotian">Laotian</option>
  <option value="latvian">Latvian</option>
  <option value="lebanese">Lebanese</option>
  <option value="liberian">Liberian</option>
  <option value="libyan">Libyan</option>
  <option value="liechtensteiner">Liechtensteiner</option>
  <option value="lithuanian">Lithuanian</option>
  <option value="luxembourger">Luxembourger</option>
  <option value="macedonian">Macedonian</option>
  <option value="malagasy">Malagasy</option>
  <option value="malawian">Malawian</option>
  <option value="malaysian">Malaysian</option>
  <option value="maldivan">Maldivan</option>
  <option value="malian">Malian</option>
  <option value="maltese">Maltese</option>
  <option value="marshallese">Marshallese</option>
  <option value="mauritanian">Mauritanian</option>
  <option value="mauritian">Mauritian</option>
  <option value="mexican">Mexican</option>
  <option value="micronesian">Micronesian</option>
  <option value="moldovan">Moldovan</option>
  <option value="monacan">Monacan</option>
  <option value="mongolian">Mongolian</option>
  <option value="moroccan">Moroccan</option>
  <option value="mosotho">Mosotho</option>
  <option value="motswana">Motswana</option>
  <option value="mozambican">Mozambican</option>
  <option value="namibian">Namibian</option>
  <option value="nauruan">Nauruan</option>
  <option value="nepalese">Nepalese</option>
  <option value="new zealander">New Zealander</option>
  <option value="ni-vanuatu">Ni-Vanuatu</option>
  <option value="nicaraguan">Nicaraguan</option>
  <option value="nigerien">Nigerien</option>
  <option value="north korean">North Korean</option>
  <option value="northern irish">Northern Irish</option>
  <option value="norwegian">Norwegian</option>
  <option value="omani">Omani</option>
  <option value="pakistani">Pakistani</option>
  <option value="palauan">Palauan</option>
  <option value="panamanian">Panamanian</option>
  <option value="papua new guinean">Papua New Guinean</option>
  <option value="paraguayan">Paraguayan</option>
  <option value="peruvian">Peruvian</option>
  <option value="polish">Polish</option>
  <option value="portuguese">Portuguese</option>
  <option value="qatari">Qatari</option>
  <option value="romanian">Romanian</option>
  <option value="russian">Russian</option>
  <option value="rwandan">Rwandan</option>
  <option value="saint lucian">Saint Lucian</option>
  <option value="salvadoran">Salvadoran</option>
  <option value="samoan">Samoan</option>
  <option value="san marinese">San Marinese</option>
  <option value="sao tomean">Sao Tomean</option>
  <option value="saudi">Saudi</option>
  <option value="scottish">Scottish</option>
  <option value="senegalese">Senegalese</option>
  <option value="serbian">Serbian</option>
  <option value="seychellois">Seychellois</option>
  <option value="sierra leonean">Sierra Leonean</option>
  <option value="singaporean">Singaporean</option>
  <option value="slovakian">Slovakian</option>
  <option value="slovenian">Slovenian</option>
  <option value="solomon islander">Solomon Islander</option>
  <option value="somali">Somali</option>
  <option value="south african">South African</option>
  <option value="south korean">South Korean</option>
  <option value="spanish">Spanish</option>
  <option value="sri lankan">Sri Lankan</option>
  <option value="sudanese">Sudanese</option>
  <option value="surinamer">Surinamer</option>
  <option value="swazi">Swazi</option>
  <option value="swedish">Swedish</option>
  <option value="swiss">Swiss</option>
  <option value="syrian">Syrian</option>
  <option value="taiwanese">Taiwanese</option>
  <option value="tajik">Tajik</option>
  <option value="tanzanian">Tanzanian</option>
  <option value="thai">Thai</option>
  <option value="togolese">Togolese</option>
  <option value="tongan">Tongan</option>
  <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
  <option value="tunisian">Tunisian</option>
  <option value="turkish">Turkish</option>
  <option value="tuvaluan">Tuvaluan</option>
  <option value="ugandan">Ugandan</option>
  <option value="ukrainian">Ukrainian</option>
  <option value="uruguayan">Uruguayan</option>
  <option value="uzbekistani">Uzbekistani</option>
  <option value="venezuelan">Venezuelan</option>
  <option value="vietnamese">Vietnamese</option>
  <option value="welsh">Welsh</option>
  <option value="yemenite">Yemenite</option>
  <option value="zambian">Zambian</option>
  <option value="zimbabwean">Zimbabwean</option>

                    </select>
                </div>
                <div class="col-md-3">
                    <label>@lang('user.Gender') *</label>
                    <select name="gender" class="form-control" required>
                        <option value="male" selected="">@lang('user.Male')</option>
                        <option value="female"> @lang('user.Female')</option>
                        <option value="other"> @lang('user.Other')</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>@lang('user.Birthday') *</label>
                    <input type="date" class="form-control" name="birthday" required>
                </div>
            </div>
            <br>
            <hr>
            <p class="text-left"> <strong>@lang('user.Banking Details'):</strong> </p>
            <div class="row">
                <div class="col-md-3">
                    <label>@lang('user.Bank name')</label>
                    <select name="bank_name" class="form-control" required>
                        <option value="DBS" selected="">@lang('user.DBS')</option>
                        <option value="OCBC"> @lang('user.OCBC')</option>
                        <option value="POSB">@lang('user.POSB')</option>
                        <option value="UOB">@lang('user.UOB')</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>@lang('user.Account no')*</label>
                    <input type="text" class="form-control" name="account_no" required>
                </div>
                <div class="col-md-3">
                    <label>@lang('user.Account holder')</label>
                    <input type="text" class="form-control" name="account_holder">
                </div>
                <div class="col-md-3">
                    <label>@lang('user.Payment information')*</label>
                    <select name="payment_information" class="form-control" required>
                        <option value="SG" selected="">Singapore</option>
                        <option value="US"> United States</option>
                        <option value="CN">Canada</option>
                        <option value="NZ">New Zealand</option>
                        <option value="KR">Korea</option>
                        <option value="JP">Japan</option>
                        <option value="VIET">Vietnam</option>
                        <option value="DB">Dubai</option>
                        <option value="IND">India</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>@lang('user.Branch')</label>
                    <input type="text" class="form-control" name="branch" required>
                </div>
                <div class="col-md-5">
                    <p class="text-grey">@lang('user.bankQuote')</p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-checkbox mb-0">
                        <input type="checkbox" class="custom-checkbox" id="terms&condition" name="terms&condition">
                        <label class="form-control-label ls-s" for="terms&condition">@lang('user.terms') <a href="#">@lang('user.agreement')</a></label>
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-md btn-block btn-dark" id="submit">@lang('auth.submit')</button>
                </div>
            </div>
        </form>
        <br>
        <hr>
    </div>
</body>
</main>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // get all country
    function getAllcountry() {
        $.ajax({
            url: "{{ route('get_all_country') }}",
            type: 'get',
            dataType: 'json',
            beforeSend: function() {
                $('#ship_charge_loder').show()
            },
            success: function(data) {
                $('#ship_charge_loder').hide()
                var len = data.length;
                for (var i = 0; i < len; i++) {
                    ''
                    $(".allcountry").append("<option value='" + data[i] + "'>" + data[i] +
                        "</option>");
                }

            }
        })
    }
    
    $('body').on('change','.placementDetails',function()
    {
        //alert('hello');
        var id= $(this).val();
        //alert(id);
         $.ajax({
                    url: "{{ route('get_placement_id') }}",
                    type: "get",
                    data: 
                    {
                        "_token": "{{ csrf_token() }}",
                              id: id
                    },
                    dataType: "json",
                    beforeSend: function() 
                    {
                        $('#user_loder').show()
                    },
                    success: function(data) 
                    {
                        $('#placement').empty();
                        if (data.view == 2) 
                        {
                            $('#placement').append(
                            '<option value="">--Select--</option> <option value="0">' + data.data
                            .left +
                            '</option><option value="1">' + data.data.right + '</option>')
                        } else 
                        {
                            $('#placement').append('<option value="">--Select--</option> <option value="' +
                            data.value + '">' + data.data +
                            '</option>')
                        }
                        $('#loder').hide();         
                    },
                    error: function() 
                    {
                        $('#user_loder').hide();
                        alert("Fail")
                    }
                })
    })

    
</script>
@endsection
            