<fieldset style="margin-left: 88px;">

<fieldset>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <fieldset>
        <div id="accordion">

            <div class="card">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne">
                        Home Delivery
                    </a>
                </div>
                <div id="collapseOne" class="collapse" data-parent="#accordion">
                    <div class="card-body" style="padding: 10px;">
                        <div class="row p-2 mb-4">
                            <div class="col-md-6 mt-2" style="border-right: 1px solid black;" id="billing_details">
                                <h3 class="title title-simple text-left text-uppercase">Billing Details</h3>
                                <div class="row mb-4">
                                    <div class="col-xs-6 text-left">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" name="firstname" id="firstname">
                                        <span style="color: red" id="firstname_error"></span>
                                    </div>
                                    <div class="col-xs-6 text-left">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control" name="lastname" id="lastname">
                                        <span style="color: red" id="lastname_error"></span>
                                    </div>
                                </div>
                                <div class="row mb-4 text-left">
                                    <label>Country / Region *</label>
                                    <div class="">
                                        <select name="country" class="form-control allcountry" id="select_country_for_de">

                                            <option value="Aruba">Aruba</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="French Southern and Antarctic Lands">French Southern and Antarctic Lands</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Saint Barthélemy">Saint Barthélemy</option>
                                            <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Caribbean Netherlands">Caribbean Netherlands</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Ivory Coast">Ivory Coast</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="DR Congo">DR Congo</option>
                                            <option value="Republic of the Congo">Republic of the Congo</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Curaçao">Curaçao</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czechia">Czechia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Finland">Finland</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Falkland Islands">Falkland Islands</option>
                                            <option value="France">France</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Micronesia">Micronesia</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="India">India</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="South Korea">South Korea</option>
                                            <option value="Kosovo">Kosovo</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Saint Martin">Saint Martin</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="North Macedonia">North Macedonia</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Pitcairn Islands">Pitcairn Islands</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="North Korea">North Korea</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Réunion">Réunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="South Georgia">South Georgia</option>
                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="South Sudan">South Sudan</option>
                                            <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Eswatini">Eswatini</option>
                                            <option value="Sint Maarten">Sint Maarten</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Timor-Leste">Timor-Leste</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="United States">United States</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vatican City">Vatican City</option>
                                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="British Virgin Islands">British Virgin Islands</option>
                                            <option value="United States Virgin Islands">United States Virgin Islands</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                            <option value="Dhekelia">Dhekelia</option>
                                            <option value="Somaliland">Somaliland</option>
                                            <option value="USNB Guantanamo Bay">USNB Guantanamo Bay</option>
                                            <option value="N. Cyprus">N. Cyprus</option>
                                            <option value="Cyprus U.N. Buffer Zone">Cyprus U.N. Buffer Zone</option>
                                            <option value="Siachen Glacier">Siachen Glacier</option>
                                            <option value="Baikonur">Baikonur</option>
                                            <option value="Akrotiri">Akrotiri</option>
                                            <option value="Indian Ocean Ter.">Indian Ocean Ter.</option>
                                            <option value="Coral Sea Is.">Coral Sea Is.</option>
                                            <option value="Spratly Is.">Spratly Is.</option>
                                            <option value="Clipperton I.">Clipperton I.</option>
                                            <option value="Ashmore and Cartier Is.">Ashmore and Cartier Is.</option>
                                            <option value="Bajo Nuevo Bank">Bajo Nuevo Bank</option>
                                            <option value="Serranilla Bank">Serranilla Bank</option>
                                            <option value="Scarborough Reef">Scarborough Reef</option>
                                            <option value="Europe Union">Europe Union</option>
                                        </select>
                                        <span style="color: red" id="country_error"></span>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-xs-12 text-left">
                                        <label>Street Address *</label>
                                        <input type="text" class="form-control" name="address" placeholder="House number and street name" id="address">
                                        <span style="color: red" id="address_error"></span>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-xs-6 text-left">
                                        <label>Town / City *</label>
                                        <input type="text" class="form-control" name="city" id="city">
                                        <span style="color: red" id="city_error"></span>
                                    </div>
                                    <div class="col-xs-6 text-left">
                                        <label>State *</label>
                                        <input type="text" class="form-control" name="state" id="state">
                                        <span style="color: red" id="state_error"></span>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-xs-6 text-left">
                                        <label>ZIP *</label>
                                        <input type="text" class="form-control" name="zip" id="zip">
                                        <span style="color: red" id="zip_error"></span>
                                    </div>
                                    <div class="col-xs-6 text-left">
                                        <label>Phone *</label>
                                        <input type="text" class="form-control" name="phone" id="phone">
                                        <span style="color: red" id="phone_error"></span>
                                    </div>
                                </div>

                                <div class="row p-2">
                                    <div class="col-md-12">
                                        <div class="form-checkbox mb-0">
                                            <input type="checkbox" class="custom-checkbox" id="create-account2" name="da">
                                            <label class="form-control-label ls-s" for="create-account2">Ship to different address</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6 mt-2" id="ship_details">
                                <h3 class="title title-simple text-left text-uppercase">Shipment Details</h3>
                                <div class="row mb-5">
                                    <div class="col-xs-6 text-left">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" name="first_name_ship" id="first_name_ship">
                                        <span style="color: red" id="first_name_ship_error"></span>
                                    </div>
                                    <div class="col-xs-6 text-left">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control" name="last_name_ship" id="last_name_ship">
                                        <span style="color: red" id="last_name_ship_error"></span>
                                    </div>
                                </div>
                                <div class="row mb-4 text-left">
                                    <label>Country / Region *</label>
                                    <div class="">
                                        <select name="country_ship" class="form-control allcountry" id="country_ship">

                                            <option value="Aruba">Aruba</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="French Southern and Antarctic Lands">French Southern and Antarctic Lands</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Saint Barthélemy">Saint Barthélemy</option>
                                            <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Caribbean Netherlands">Caribbean Netherlands</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Ivory Coast">Ivory Coast</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="DR Congo">DR Congo</option>
                                            <option value="Republic of the Congo">Republic of the Congo</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Curaçao">Curaçao</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czechia">Czechia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Finland">Finland</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Falkland Islands">Falkland Islands</option>
                                            <option value="France">France</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Micronesia">Micronesia</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="India">India</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="South Korea">South Korea</option>
                                            <option value="Kosovo">Kosovo</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Saint Martin">Saint Martin</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="North Macedonia">North Macedonia</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Pitcairn Islands">Pitcairn Islands</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="North Korea">North Korea</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Réunion">Réunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="South Georgia">South Georgia</option>
                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="South Sudan">South Sudan</option>
                                            <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Eswatini">Eswatini</option>
                                            <option value="Sint Maarten">Sint Maarten</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Timor-Leste">Timor-Leste</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="United States">United States</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vatican City">Vatican City</option>
                                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="British Virgin Islands">British Virgin Islands</option>
                                            <option value="United States Virgin Islands">United States Virgin Islands</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                            <option value="Dhekelia">Dhekelia</option>
                                            <option value="Somaliland">Somaliland</option>
                                            <option value="USNB Guantanamo Bay">USNB Guantanamo Bay</option>
                                            <option value="N. Cyprus">N. Cyprus</option>
                                            <option value="Cyprus U.N. Buffer Zone">Cyprus U.N. Buffer Zone</option>
                                            <option value="Siachen Glacier">Siachen Glacier</option>
                                            <option value="Baikonur">Baikonur</option>
                                            <option value="Akrotiri">Akrotiri</option>
                                            <option value="Indian Ocean Ter.">Indian Ocean Ter.</option>
                                            <option value="Coral Sea Is.">Coral Sea Is.</option>
                                            <option value="Spratly Is.">Spratly Is.</option>
                                            <option value="Clipperton I.">Clipperton I.</option>
                                            <option value="Ashmore and Cartier Is.">Ashmore and Cartier Is.</option>
                                            <option value="Bajo Nuevo Bank">Bajo Nuevo Bank</option>
                                            <option value="Serranilla Bank">Serranilla Bank</option>
                                            <option value="Scarborough Reef">Scarborough Reef</option>
                                            <option value="Europe Union">Europe Union</option>
                                        </select>
                                        <span style="color: red" id="country_ship_error"></span>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-xs-12 text-left">
                                        <label>Street Address *</label>
                                        <input type="text" class="form-control" name="address_ship" placeholder="House number and street name" id="address_ship">
                                        <span style="color: red" id="address_ship_error"></span>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-xs-6 text-left">
                                        <label>Town / City *</label>
                                        <input type="text" class="form-control" name="city_ship" id="city_ship">
                                        <span style="color: red" id="city_ship_error"></span>
                                    </div>
                                    <div class="col-xs-6 text-left">
                                        <label>State *</label>
                                        <input type="text" class="form-control" name="state_ship" id="state_ship">
                                        <span style="color: red" id="state_ship_error"></span>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-xs-6 text-left">
                                        <label>ZIP *</label>
                                        <input type="text" class="form-control" name="zip_ship" id="zip_ship">
                                        <span style="color: red" id="zip_ship_error"></span>
                                    </div>
                                    <div class="col-xs-6 text-left">
                                        <label>Phone *</label>
                                        <input type="text" class="form-control" name="phone_ship" id="phone_ship">
                                        <span style="color: red" id="phone_ship_error"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                        Self Pickup
                    </a>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body" style="padding: 10px;">
                        <div class="row p-2">
                            <div class="row text-left">
                                <label>Country / Region *</label>
                                <div class="">
                                    <select name="country_self" class="form-control" id="country_self">
                                        <option value="Singapore" selected="">
                                            Singapore
                                        </option>
                                    </select>
                                    <span style="color: red" id="country_self_error"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 text-left">
                                    <label>State *</label>
                                    <input type="text" class="form-control" name="state_self" id="state_self">
                                    <span style="color: red" id="state_self_error"></span>
                                </div>
                                <div class="col-xs-6 text-left">
                                    <label>ZIP *</label>
                                    <input type="text" class="form-control" name="zip_self" id="zip_self">
                                    <span style="color: red" id="zip_self_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>







    </fieldset>

</fieldset>
<input type="button" name="previous" class="previous action-button-previous" value="Previous" style="position: relative; top: -40px; right: -330px;" />
<input type="button" name="make_payment" class="next action-button" style="position:relative; right:-330px; top:-40px;" value="Confirm" />
</fieldset>