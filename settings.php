<?php
session_start();
include 'includes/dbConnection.php';

if (!$_SESSION["user_name_loggedIn_admin"]) {
    $_SESSION["expired_session"] = "Your session has been expired, relog in!";
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AX GYM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <?php include 'globalExternals/components.php'; ?>

    <script src="/dasinfoau/php/gym/js/app.min.js"></script>
    <script src="/dasinfoau/php/gym/js/validationEngine/languages/jquery.validationEngine-en.js"></script>
    <script src="/dasinfoau/php/gym/js/validationEngine/jquery.validationEngine.js"></script>
    <script src="/dasinfoau/php/gym/js/gym_ajax.js"></script>
    <script>
        $(document).ready(function() {
            $(".validateForm").validationEngine(); /* {binded:false} */
            $('.textarea').wysihtml5();
            $(".dataTable").dataTable({});

            $(".dob").datepicker({
                maxDate: new Date(),
                changeMonth: true,
                changeYear: true,
                yearRange: '-65:+0',
                dateFormat: "MM d, yy"
            });
            $(".dob").datepicker($.datepicker.regional['en']);

            $(".hasDatepicker,.datepick,.date,.mem_valid_from,.sell-date,.dob,.datepicker-days").datepicker({
                language: "en",
                changeMonth: true,
                changeYear: true,
                dateFormat: "MM d, yy"
            });
            $(".hasDatepicker,.datepick,.date,.mem_valid_from,.sell-date,.dob,.datepicker-days").datepicker($.datepicker.regional['en']);


            $(".hasDatepicker,.datepick,.date,.mem_valid_from,.sell-date,.dob,.datepicker-days,.mem_valid_to").on('keydown', function() {
                return false;
            });
        });
    </script>

</head>

<body id="page-top" class="fixed-nav">
    <?php include 'navigations/NavigationBar.php'; ?>

    <div id="wrapper">
        <div id="content-wrapper">
            <div class="container-fluid">
                <section class="content">
                    <div class="col-md-12 box box-default">
                        <div class="box-header">
                            <section class="content-header">
                                <h1><i class="fa fa-cog"></i>
                                    General Settings
                                </h1>
                            </section>
                        </div>
                        <hr>
                        <div class="box-body">
                            <form enctype="multipart/form-data" method="post" accept-charset="utf-8" class="validateForm form-horizontal" action="/dasinfoau/php/gym/general-setting/save-setting">
                                <div style="display:none;"><input type="hidden" name="_method" value="POST" /></div>
                                <fieldset>
                                    <legend>System Settings</legend>
                                    <div class='form-group'><label class='control-label col-md-2'>Gym Name<span class='text-danger'> *</span></label>
                                        <div class='col-md-8'>
                                            <div class="input text"><input type="text" name="name" class="form-control validate[required]" id="" value="AX GYM - GYM Management System" /></div>
                                        </div>
                                    </div>
                                    <div class='form-group'><label class='control-label col-md-2'>Starting Year<span class='text-danger'> *</span></label>
                                        <div class='col-md-8'>
                                            <div class="input text"><input type="text" name="start_year" class="form-control validate[required,custom[onlyNumberSp]]" id="" value="2019" /></div>
                                        </div>
                                    </div>
                                    <div class='form-group'><label class='control-label col-md-2'>Gym Address<span class='text-danger'> *</span></label>
                                        <div class='col-md-8'>
                                            <div class="input text"><input type="text" name="address" class="form-control validate[required]" id="" value="address" /></div>
                                        </div>
                                    </div>
                                    <div class='form-group'><label class='control-label col-md-2'>Office Phone Number<span class='text-danger'>*</span></label>
                                        <div class='col-md-8'>
                                            <div class="input text"><input type="text" name="office_number" class="form-control validate[required,custom[onlyNumberSp]]" id="" value="03-000000" /></div>
                                        </div>
                                    </div>
                                    <div class='form-group'><label class='control-label col-md-2'>Country</label>
                                        <div class='col-md-8'>
                                            <select id="country" class="form-control" name="country">
                                                <option value="in">India</option>
                                                <option value="af">Afghanistan</option>
                                                <option value="al">Albania</option>
                                                <option value="dz">Algeria</option>
                                                <option value="ad">Andorra</option>
                                                <option value="ao">Angola</option>
                                                <option value="aq">Antarctica</option>
                                                <option value="ar">Argentina</option>
                                                <option value="am">Armenia</option>
                                                <option value="aw">Aruba</option>
                                                <option value="au">Australia</option>
                                                <option value="at">Austria</option>
                                                <option value="az">Azerbaijan</option>
                                                <option value="bh">Bahrain</option>
                                                <option value="bd">Bangladesh</option>
                                                <option value="by">Belarus</option>
                                                <option value="be">Belgium</option>
                                                <option value="bz">Belize</option>
                                                <option value="bj">Benin</option>
                                                <option value="bt">Bhutan</option>
                                                <option value="bo">Bolivia, Plurinational State Of</option>
                                                <option value="ba">Bosnia And Herzegovina</option>
                                                <option value="bw">Botswana</option>
                                                <option value="br">Brazil</option>
                                                <option value="bn">Brunei Darussalam</option>
                                                <option value="bg">Bulgaria</option>
                                                <option value="bf">Burkina Faso</option>
                                                <option value="mm">Myanmar</option>
                                                <option value="bi">Burundi</option>
                                                <option value="cm">Cameroon</option>
                                                <option value="ca">Canada</option>
                                                <option value="cv">Cape Verde</option>
                                                <option value="cf">Central African Republic</option>
                                                <option value="td">Chad</option>
                                                <option value="cl">Chile</option>
                                                <option value="cn">China</option>
                                                <option value="cx">Christmas Island</option>
                                                <option value="cc">Cocos (keeling) Islands</option>
                                                <option value="co">Colombia</option>
                                                <option value="km">Comoros</option>
                                                <option value="cg">Congo</option>
                                                <option value="cd">Congo, The Democratic Republic Of The</option>
                                                <option value="ck">Cook Islands</option>
                                                <option value="cr">Costa Rica</option>
                                                <option value="hr">Croatia</option>
                                                <option value="cu">Cuba</option>
                                                <option value="cy">Cyprus</option>
                                                <option value="cz">Czech Republic</option>
                                                <option value="dk">Denmark</option>
                                                <option value="dj">Djibouti</option>
                                                <option value="tl">Timor-leste</option>
                                                <option value="ec">Ecuador</option>
                                                <option value="eg">Egypt</option>
                                                <option value="sv">El Salvador</option>
                                                <option value="gq">Equatorial Guinea</option>
                                                <option value="er">Eritrea</option>
                                                <option value="ee">Estonia</option>
                                                <option value="et">Ethiopia</option>
                                                <option value="fk">Falkland Islands (malvinas)</option>
                                                <option value="fo">Faroe Islands</option>
                                                <option value="fj">Fiji</option>
                                                <option value="fi">Finland</option>
                                                <option value="fr">France</option>
                                                <option value="pf">French Polynesia</option>
                                                <option value="ga">Gabon</option>
                                                <option value="gm">Gambia</option>
                                                <option value="ge">Georgia</option>
                                                <option value="de">Germany</option>
                                                <option value="gh">Ghana</option>
                                                <option value="gi">Gibraltar</option>
                                                <option value="gr">Greece</option>
                                                <option value="gl">Greenland</option>
                                                <option value="gt">Guatemala</option>
                                                <option value="gn">Guinea</option>
                                                <option value="gw">Guinea-bissau</option>
                                                <option value="gy">Guyana</option>
                                                <option value="ht">Haiti</option>
                                                <option value="hn">Honduras</option>
                                                <option value="hk">Hong Kong</option>
                                                <option value="hu">Hungary</option>
                                                <option value="id">Indonesia</option>
                                                <option value="ir">Iran, Islamic Republic Of</option>
                                                <option value="iq">Iraq</option>
                                                <option value="ie">Ireland</option>
                                                <option value="im">Isle Of Man</option>
                                                <option value="il">Israel</option>
                                                <option value="it">Italy</option>
                                                <option value="ci">Côte D'ivoire</option>
                                                <option value="jp">Japan</option>
                                                <option value="jo">Jordan</option>
                                                <option value="kz">Kazakhstan</option>
                                                <option value="ke">Kenya</option>
                                                <option value="ki">Kiribati</option>
                                                <option value="kw">Kuwait</option>
                                                <option value="kg">Kyrgyzstan</option>
                                                <option value="la">Lao People's Democratic Republic</option>
                                                <option value="lv">Latvia</option>
                                                <option value="lb" selected>Lebanon</option>
                                                <option value="ls">Lesotho</option>
                                                <option value="lr">Liberia</option>
                                                <option value="ly">Libya</option>
                                                <option value="li">Liechtenstein</option>
                                                <option value="lt">Lithuania</option>
                                                <option value="lu">Luxembourg</option>
                                                <option value="mo">Macao</option>
                                                <option value="mk">Macedonia, The Former Yugoslav Republic Of</option>
                                                <option value="mg">Madagascar</option>
                                                <option value="mw">Malawi</option>
                                                <option value="my">Malaysia</option>
                                                <option value="mv">Maldives</option>
                                                <option value="ml">Mali</option>
                                                <option value="mt">Malta</option>
                                                <option value="mh">Marshall Islands</option>
                                                <option value="mr">Mauritania</option>
                                                <option value="mu">Mauritius</option>
                                                <option value="yt">Mayotte</option>
                                                <option value="mx">Mexico</option>
                                                <option value="fm">Micronesia, Federated States Of</option>
                                                <option value="md">Moldova, Republic Of</option>
                                                <option value="mc">Monaco</option>
                                                <option value="mn">Mongolia</option>
                                                <option value="me">Montenegro</option>
                                                <option value="ma">Morocco</option>
                                                <option value="mz">Mozambique</option>
                                                <option value="na">Namibia</option>
                                                <option value="nr">Nauru</option>
                                                <option value="np">Nepal</option>
                                                <option value="nl">Netherlands</option>
                                                <option value="nc">New Caledonia</option>
                                                <option value="nz">New Zealand</option>
                                                <option value="ni">Nicaragua</option>
                                                <option value="ne">Niger</option>
                                                <option value="ng">Nigeria</option>
                                                <option value="nu">Niue</option>
                                                <option value="kp">Korea, Democratic People's Republic Of</option>
                                                <option value="no">Norway</option>
                                                <option value="om">Oman</option>
                                                <option value="pk">Pakistan</option>
                                                <option value="pw">Palau</option>
                                                <option value="pa">Panama</option>
                                                <option value="pg">Papua New Guinea</option>
                                                <option value="py">Paraguay</option>
                                                <option value="pe">Peru</option>
                                                <option value="ph">Philippines</option>
                                                <option value="pn">Pitcairn</option>
                                                <option value="pl">Poland</option>
                                                <option value="pt">Portugal</option>
                                                <option value="pr">Puerto Rico</option>
                                                <option value="qa">Qatar</option>
                                                <option value="ro">Romania</option>
                                                <option value="ru">Russian Federation</option>
                                                <option value="rw">Rwanda</option>
                                                <option value="bl">Saint Barthélemy</option>
                                                <option value="ws">Samoa</option>
                                                <option value="sm">San Marino</option>
                                                <option value="st">Sao Tome And Principe</option>
                                                <option value="sa">Saudi Arabia</option>
                                                <option value="sn">Senegal</option>
                                                <option value="rs">Serbia</option>
                                                <option value="sc">Seychelles</option>
                                                <option value="sl">Sierra Leone</option>
                                                <option value="sg">Singapore</option>
                                                <option value="sk">Slovakia</option>
                                                <option value="si">Slovenia</option>
                                                <option value="sb">Solomon Islands</option>
                                                <option value="so">Somalia</option>
                                                <option value="za">South Africa</option>
                                                <option value="kr">Korea, Republic Of</option>
                                                <option value="es">Spain</option>
                                                <option value="lk">Sri Lanka</option>
                                                <option value="sh">Saint Helena, Ascension And Tristan Da Cunha</option>
                                                <option value="pm">Saint Pierre And Miquelon</option>
                                                <option value="sd">Sudan</option>
                                                <option value="sr">Suriname</option>
                                                <option value="sz">Swaziland</option>
                                                <option value="se">Sweden</option>
                                                <option value="ch">Switzerland</option>
                                                <option value="sy">Syrian Arab Republic</option>
                                                <option value="tw">Taiwan, Province Of China</option>
                                                <option value="tj">Tajikistan</option>
                                                <option value="tz">Tanzania, United Republic Of</option>
                                                <option value="th">Thailand</option>
                                                <option value="tg">Togo</option>
                                                <option value="tk">Tokelau</option>
                                                <option value="to">Tonga</option>
                                                <option value="tn">Tunisia</option>
                                                <option value="tr">Turkey</option>
                                                <option value="tm">Turkmenistan</option>
                                                <option value="tv">Tuvalu</option>
                                                <option value="ae">United Arab Emirates</option>
                                                <option value="ug">Uganda</option>
                                                <option value="gb">United Kingdom</option>
                                                <option value="uy">Uruguay</option>
                                                <option value="us">United States</option>
                                                <option value="uz">Uzbekistan</option>
                                                <option value="vu">Vanuatu</option>
                                                <option value="va">Holy See (vatican City State)</option>
                                                <option value="ve">Venezuela, Bolivarian Republic Of</option>
                                                <option value="vn">Viet Nam</option>
                                                <option value="wf">Wallis And Futuna</option>
                                                <option value="ye">Yemen</option>
                                                <option value="zm">Zambia</option>
                                                <option value="zw">Zimbabwe</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class='form-group'><label class='control-label col-md-2'>System Language</label>
                                        <div class='col-md-8'> <input type='hidden' id='s_lang' value='en'>
                                            <select id="sys_language" class="form-control" name="sys_language" id="s_lang">
                                                <option value="en">English/en</option>
                                                <option value="ar">Arabic/ar</option>
                                                <option value="zh_CN">Chinese/zh-CN</option>
                                                <option value="cs">Czech/cs</option>
                                                <option value="fr">French/fr</option>
                                                <option value="de">German/de</option>
                                                <option value="el">Greek/el</option>
                                                <option value="it">Italian/it</option>
                                                <option value="ja">Japan/ja</option>
                                                <option value="pl">Polish/pl</option>
                                                <option value="pt_BR">Portuguese-BR/pt-BR</option>
                                                <option value="pt_PT">Portuguese-PT/pt-PT</option>
                                                <option value="fa">Persian/fa</option>
                                                <option value="ru">Russian/ru</option>
                                                <option value="es">Spanish/es</option>
                                                <option value="th">Thai/th</option>
                                                <option value="tr">Turkish/tr</option>
                                                <option value="ca">Catalan/ca</option>
                                                <option value="da">Danish/da</option>
                                                <option value="et">Estonian/et</option>
                                                <option value="fi">Finnish/fi</option>
                                                <option value="he">Hebrew (Israel)/he</option>
                                                <option value="hr">Croatian/hr</option>
                                                <option value="hu">Hungarian/hu</option>
                                                <option value="id">Indonesian/id</option>
                                                <option value="lt">Lithuanian/lt</option>
                                                <option value="nl">Dutch/nl</option>
                                                <option value="no">Norwegian/no</option>
                                                <option value="ro">Romanian/ro</option>
                                                <option value="sv">Swadish/sv</option>
                                                <option value="vi">Vietnamese/vi</option>
                                            </select>

                                            <script>
                                                var sys_lang = $("#s_lang").val();
                                                $("#sys_language option[value=" + sys_lang + "]").prop("selected", true);
                                            </script>
                                        </div>
                                    </div>

                                    <div class='form-group'><label class='control-label col-md-2'>Email<span class='text-danger'>*</span></label>
                                        <div class='col-md-8'>
                                            <div class="input text"><input type="text" name="email" class="form-control validate[required,custom[email]]" id="" value="AX_GYM@management.com" /></div>
                                        </div>
                                    </div>

                                    <div class='form-group'><label class='control-label col-md-2'>Gym Logo</label>
                                        <div class='col-md-6'><input type="file" name="gym_logo" class="form-control"></div>
                                        <div class='col-md-2'>(Max. height 50px.)</div>
                                    </div>
                                    <div class='col-md-offset-2'><input type="hidden" name="old_gym_logo" class="form-control" id="" value="logo.png" /><img src='/dasinfoau/php/gym/webroot/upload/logo.png'><br><br><br></div>
                                    <div class='form-group'><label class='control-label col-md-2'>Cover Image</label>
                                        <div class='col-md-8'><input type="file" name="cover_image" class="form-control"></div>
                                    </div><input type="hidden" name="old_cover_image" class="form-control" id="" value="cover-image.png" /><img src='/dasinfoau/php/gym/webroot/upload/cover-image.png' style='max-width: 100%;'>
                                </fieldset><br><br>


                                </fieldset><br><br><button class="btn btn-flat btn-success" name="save_setting" type="submit" style="float:right;">Save Settings</button>
                            </form>
                        </div>

                    </div>
                </section>

                <div class="modal fade gym-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg gym-modal">
                        <div class="modal-content">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>

</html>