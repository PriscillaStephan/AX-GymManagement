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
            $(".dataTable").dataTable({
                /* "language": {
                "url": "dataTables.german.lang"
				} */
            });



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
                <div id="reports-container">
                    <section class="content">
                        <br>
                        <div class="col-md-12 box box-default">
                            <div class="box-header">
                                <section class="content-header">
                                    <h1>
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
                                                <div class="input text"><input type="text" name="name" class="form-control validate[required]" id="" value="GYM Master - GYM Management System" /></div>
                                            </div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Starting Year<span class='text-danger'> *</span></label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="start_year" class="form-control validate[required,custom[onlyNumberSp]]" id="" value="2018" /></div>
                                            </div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Gym Address<span class='text-danger'> *</span></label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="address" class="form-control validate[required]" id="" value="address" /></div>
                                            </div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Office Phone Number<span class='text-danger'>*</span></label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="office_number" class="form-control validate[required,custom[onlyNumberSp]]" id="" value="8899665544" /></div>
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
                                                    <option value="au" selected>Australia</option>
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
                                                    <option value="lb">Lebanon</option>
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
                                        <div class='form-group'><label class='control-label col-md-2'>Set Language to RTL</label>
                                            <div class='col-md-8 checkbox'><label class='save_enable'><input type="hidden" name="enable_rtl" value="0" /><input type="checkbox" name="enable_rtl" value="1"> Enable</label></div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Email<span class='text-danger'>*</span></label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="email" class="form-control validate[required,custom[email]]" id="" value="priyal@dasinfomedia.com" /></div>
                                            </div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Date Format</label>
                                            <div class='col-md-8'><select name="date_format" class="form-control plan_list validate[required]">
                                                    <option value="F j, Y" selected="selected">March 29, 2019</option>
                                                    <option value="Y-m-d">2019-03-29</option>
                                                    <option value="m/d/Y">03/29/2019</option>
                                                </select></div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Time Zone</label>
                                            <div class='col-md-8'> <input type="hidden" value="UTC" id="timezone_val">
                                                <select id="timezone-selector" name="time_zone" class="form-control">
                                                    <option value="Australia/Adelaide">Australia/Adelaide</option>
                                                    <option value="Australia/Broken_Hill">Australia/Broken_Hill</option>
                                                    <option value="Australia/Darwin">Australia/Darwin</option>
                                                    <option value="Australia/North">Australia/North</option>
                                                    <option value="Australia/South">Australia/South</option>
                                                    <option value="Australia/Yancowinna">Australia/Yancowinna</option>
                                                    <option value="Australia/Adelaide">Australia/Adelaide</option>
                                                    <option value="Australia/Adelaide">Australia/Adelaide</option>
                                                    <option value="Australia/Broken_Hill">Australia/Broken_Hill</option>
                                                    <option value="Australia/Darwin">Australia/Darwin</option>
                                                    <option value="Australia/North">Australia/North</option>
                                                    <option value="Australia/South">Australia/South</option>
                                                    <option value="Australia/Yancowinna">Australia/Yancowinna</option>
                                                    <option value="Australia/Broken_Hill">Australia/Broken_Hill</option>
                                                    <option value="Australia/Darwin">Australia/Darwin</option>
                                                    <option value="Australia/North">Australia/North</option>
                                                    <option value="Australia/South">Australia/South</option>
                                                    <option value="Australia/Yancowinna">Australia/Yancowinna</option>
                                                    <option value="America/Goose_Bay">America/Goose_Bay</option>
                                                    <option value="America/Pangnirtung">America/Pangnirtung</option>
                                                    <option value="America/Halifax">America/Halifax</option>
                                                    <option value="America/Barbados">America/Barbados</option>
                                                    <option value="America/Blanc-Sablon">America/Blanc-Sablon</option>
                                                    <option value="America/Glace_Bay">America/Glace_Bay</option>
                                                    <option value="America/Goose_Bay">America/Goose_Bay</option>
                                                    <option value="America/Martinique">America/Martinique</option>
                                                    <option value="America/Moncton">America/Moncton</option>
                                                    <option value="America/Pangnirtung">America/Pangnirtung</option>
                                                    <option value="America/Thule">America/Thule</option>
                                                    <option value="Atlantic/Bermuda">Atlantic/Bermuda</option>
                                                    <option value="Canada/Atlantic">Canada/Atlantic</option>
                                                    <option value="Australia/Melbourne">Australia/Melbourne</option>
                                                    <option value="Antarctica/Macquarie">Antarctica/Macquarie</option>
                                                    <option value="Australia/ACT">Australia/ACT</option>
                                                    <option value="Australia/Brisbane">Australia/Brisbane</option>
                                                    <option value="Australia/Canberra">Australia/Canberra</option>
                                                    <option value="Australia/Currie">Australia/Currie</option>
                                                    <option value="Australia/Hobart">Australia/Hobart</option>
                                                    <option value="Australia/Lindeman">Australia/Lindeman</option>
                                                    <option value="Australia/NSW">Australia/NSW</option>
                                                    <option value="Australia/Queensland">Australia/Queensland</option>
                                                    <option value="Australia/Sydney">Australia/Sydney</option>
                                                    <option value="Australia/Tasmania">Australia/Tasmania</option>
                                                    <option value="Australia/Victoria">Australia/Victoria</option>
                                                    <option value="Australia/Melbourne">Australia/Melbourne</option>
                                                    <option value="Antarctica/Macquarie">Antarctica/Macquarie</option>
                                                    <option value="Australia/ACT">Australia/ACT</option>
                                                    <option value="Australia/Brisbane">Australia/Brisbane</option>
                                                    <option value="Australia/Canberra">Australia/Canberra</option>
                                                    <option value="Australia/Currie">Australia/Currie</option>
                                                    <option value="Australia/Hobart">Australia/Hobart</option>
                                                    <option value="Australia/LHI">Australia/LHI</option>
                                                    <option value="Australia/Lindeman">Australia/Lindeman</option>
                                                    <option value="Australia/Lord_Howe">Australia/Lord_Howe</option>
                                                    <option value="Australia/NSW">Australia/NSW</option>
                                                    <option value="Australia/Queensland">Australia/Queensland</option>
                                                    <option value="Australia/Sydney">Australia/Sydney</option>
                                                    <option value="Australia/Tasmania">Australia/Tasmania</option>
                                                    <option value="Australia/Victoria">Australia/Victoria</option>
                                                    <option value="America/Anchorage">America/Anchorage</option>
                                                    <option value="America/Anchorage">America/Anchorage</option>
                                                    <option value="America/Adak">America/Adak</option>
                                                    <option value="America/Atka">America/Atka</option>
                                                    <option value="America/Anchorage">America/Anchorage</option>
                                                    <option value="America/Juneau">America/Juneau</option>
                                                    <option value="America/Metlakatla">America/Metlakatla</option>
                                                    <option value="America/Nome">America/Nome</option>
                                                    <option value="America/Sitka">America/Sitka</option>
                                                    <option value="America/Yakutat">America/Yakutat</option>
                                                    <option value="America/Anchorage">America/Anchorage</option>
                                                    <option value="America/Juneau">America/Juneau</option>
                                                    <option value="America/Metlakatla">America/Metlakatla</option>
                                                    <option value="America/Nome">America/Nome</option>
                                                    <option value="America/Sitka">America/Sitka</option>
                                                    <option value="America/Yakutat">America/Yakutat</option>
                                                    <option value="America/Asuncion">America/Asuncion</option>
                                                    <option value="Europe/Amsterdam">Europe/Amsterdam</option>
                                                    <option value="Europe/Athens">Europe/Athens</option>
                                                    <option value="America/Halifax">America/Halifax</option>
                                                    <option value="America/Blanc-Sablon">America/Blanc-Sablon</option>
                                                    <option value="America/Glace_Bay">America/Glace_Bay</option>
                                                    <option value="America/Moncton">America/Moncton</option>
                                                    <option value="America/Pangnirtung">America/Pangnirtung</option>
                                                    <option value="America/Puerto_Rico">America/Puerto_Rico</option>
                                                    <option value="Canada/Atlantic">Canada/Atlantic</option>
                                                    <option value="America/Anchorage">America/Anchorage</option>
                                                    <option value="America/Anguilla">America/Anguilla</option>
                                                    <option value="America/Antigua">America/Antigua</option>
                                                    <option value="America/Aruba">America/Aruba</option>
                                                    <option value="America/Barbados">America/Barbados</option>
                                                    <option value="America/Blanc-Sablon">America/Blanc-Sablon</option>
                                                    <option value="America/Curacao">America/Curacao</option>
                                                    <option value="America/Dominica">America/Dominica</option>
                                                    <option value="America/Glace_Bay">America/Glace_Bay</option>
                                                    <option value="America/Goose_Bay">America/Goose_Bay</option>
                                                    <option value="America/Grand_Turk">America/Grand_Turk</option>
                                                    <option value="America/Grenada">America/Grenada</option>
                                                    <option value="America/Guadeloupe">America/Guadeloupe</option>
                                                    <option value="America/Halifax">America/Halifax</option>
                                                    <option value="America/Kralendijk">America/Kralendijk</option>
                                                    <option value="America/Lower_Princes">America/Lower_Princes</option>
                                                    <option value="America/Marigot">America/Marigot</option>
                                                    <option value="America/Martinique">America/Martinique</option>
                                                    <option value="America/Miquelon">America/Miquelon</option>
                                                    <option value="America/Moncton">America/Moncton</option>
                                                    <option value="America/Montserrat">America/Montserrat</option>
                                                    <option value="America/Pangnirtung">America/Pangnirtung</option>
                                                    <option value="America/Port_of_Spain">America/Port_of_Spain</option>
                                                    <option value="America/Puerto_Rico">America/Puerto_Rico</option>
                                                    <option value="America/Santo_Domingo">America/Santo_Domingo</option>
                                                    <option value="America/St_Barthelemy">America/St_Barthelemy</option>
                                                    <option value="America/St_Kitts">America/St_Kitts</option>
                                                    <option value="America/St_Lucia">America/St_Lucia</option>
                                                    <option value="America/St_Thomas">America/St_Thomas</option>
                                                    <option value="America/St_Vincent">America/St_Vincent</option>
                                                    <option value="America/Thule">America/Thule</option>
                                                    <option value="America/Tortola">America/Tortola</option>
                                                    <option value="America/Virgin">America/Virgin</option>
                                                    <option value="Atlantic/Bermuda">Atlantic/Bermuda</option>
                                                    <option value="Canada/Atlantic">Canada/Atlantic</option>
                                                    <option value="America/Anchorage">America/Anchorage</option>
                                                    <option value="Australia/Perth">Australia/Perth</option>
                                                    <option value="Australia/West">Australia/West</option>
                                                    <option value="Australia/Perth">Australia/Perth</option>
                                                    <option value="Australia/West">Australia/West</option>
                                                    <option value="America/Halifax">America/Halifax</option>
                                                    <option value="America/Blanc-Sablon">America/Blanc-Sablon</option>
                                                    <option value="America/Glace_Bay">America/Glace_Bay</option>
                                                    <option value="America/Moncton">America/Moncton</option>
                                                    <option value="America/Pangnirtung">America/Pangnirtung</option>
                                                    <option value="America/Puerto_Rico">America/Puerto_Rico</option>
                                                    <option value="Canada/Atlantic">Canada/Atlantic</option>
                                                    <option value="America/Anchorage">America/Anchorage</option>
                                                    <option value="Europe/London">Europe/London</option>
                                                    <option value="Europe/Belfast">Europe/Belfast</option>
                                                    <option value="Europe/Gibraltar">Europe/Gibraltar</option>
                                                    <option value="Europe/Guernsey">Europe/Guernsey</option>
                                                    <option value="Europe/Isle_of_Man">Europe/Isle_of_Man</option>
                                                    <option value="Europe/Jersey">Europe/Jersey</option>
                                                    <option value="GB">GB</option>
                                                    <option value="America/Adak">America/Adak</option>
                                                    <option value="America/Atka">America/Atka</option>
                                                    <option value="America/Nome">America/Nome</option>
                                                    <option value="America/Barbados">America/Barbados</option>
                                                    <option value="Europe/Tiraspol">Europe/Tiraspol</option>
                                                    <option value="America/Bogota">America/Bogota</option>
                                                    <option value="Europe/Brussels">Europe/Brussels</option>
                                                    <option value="Asia/Baghdad">Asia/Baghdad</option>
                                                    <option value="Europe/Busingen">Europe/Busingen</option>
                                                    <option value="Europe/Vaduz">Europe/Vaduz</option>
                                                    <option value="Europe/Zurich">Europe/Zurich</option>
                                                    <option value="Asia/Bangkok">Asia/Bangkok</option>
                                                    <option value="Asia/Phnom_Penh">Asia/Phnom_Penh</option>
                                                    <option value="Asia/Vientiane">Asia/Vientiane</option>
                                                    <option value="Asia/Jakarta">Asia/Jakarta</option>
                                                    <option value="Europe/Bucharest">Europe/Bucharest</option>
                                                    <option value="Europe/Chisinau">Europe/Chisinau</option>
                                                    <option value="America/La_Paz">America/La_Paz</option>
                                                    <option value="Europe/London">Europe/London</option>
                                                    <option value="Europe/London">Europe/London</option>
                                                    <option value="America/Adak">America/Adak</option>
                                                    <option value="America/Atka">America/Atka</option>
                                                    <option value="America/Nome">America/Nome</option>
                                                    <option value="Europe/Belfast">Europe/Belfast</option>
                                                    <option value="Europe/Guernsey">Europe/Guernsey</option>
                                                    <option value="Europe/Isle_of_Man">Europe/Isle_of_Man</option>
                                                    <option value="Europe/Jersey">Europe/Jersey</option>
                                                    <option value="GB">GB</option>
                                                    <option value="Europe/Belfast">Europe/Belfast</option>
                                                    <option value="Europe/Dublin">Europe/Dublin</option>
                                                    <option value="Europe/Gibraltar">Europe/Gibraltar</option>
                                                    <option value="Europe/Guernsey">Europe/Guernsey</option>
                                                    <option value="Europe/Isle_of_Man">Europe/Isle_of_Man</option>
                                                    <option value="Europe/Jersey">Europe/Jersey</option>
                                                    <option value="GB">GB</option>
                                                    <option value="Australia/Adelaide">Australia/Adelaide</option>
                                                    <option value="Africa/Juba">Africa/Juba</option>
                                                    <option value="Africa/Khartoum">Africa/Khartoum</option>
                                                    <option value="Africa/Khartoum">Africa/Khartoum</option>
                                                    <option value="Africa/Blantyre">Africa/Blantyre</option>
                                                    <option value="Africa/Bujumbura">Africa/Bujumbura</option>
                                                    <option value="Africa/Gaborone">Africa/Gaborone</option>
                                                    <option value="Africa/Harare">Africa/Harare</option>
                                                    <option value="Africa/Juba">Africa/Juba</option>
                                                    <option value="Africa/Kigali">Africa/Kigali</option>
                                                    <option value="Africa/Lubumbashi">Africa/Lubumbashi</option>
                                                    <option value="Africa/Lusaka">Africa/Lusaka</option>
                                                    <option value="Africa/Maputo">Africa/Maputo</option>
                                                    <option value="Africa/Windhoek">Africa/Windhoek</option>
                                                    <option value="America/Rankin_Inlet">America/Rankin_Inlet</option>
                                                    <option value="America/Resolute">America/Resolute</option>
                                                    <option value="America/Chicago">America/Chicago</option>
                                                    <option value="Asia/Shanghai">Asia/Shanghai</option>
                                                    <option value="America/Havana">America/Havana</option>
                                                    <option value="America/Atikokan">America/Atikokan</option>
                                                    <option value="America/Bahia_Banderas">America/Bahia_Banderas</option>
                                                    <option value="America/Belize">America/Belize</option>
                                                    <option value="America/Cambridge_Bay">America/Cambridge_Bay</option>
                                                    <option value="America/Cancun">America/Cancun</option>
                                                    <option value="America/Chihuahua">America/Chihuahua</option>
                                                    <option value="America/Coral_Harbour">America/Coral_Harbour</option>
                                                    <option value="America/Costa_Rica">America/Costa_Rica</option>
                                                    <option value="America/El_Salvador">America/El_Salvador</option>
                                                    <option value="America/Fort_Wayne">America/Fort_Wayne</option>
                                                    <option value="America/Guatemala">America/Guatemala</option>
                                                    <option value="America/Indiana/Indianapolis">America/Indiana/Indianapolis</option>
                                                    <option value="America/Indiana/Knox">America/Indiana/Knox</option>
                                                    <option value="America/Indiana/Marengo">America/Indiana/Marengo</option>
                                                    <option value="America/Indiana/Petersburg">America/Indiana/Petersburg</option>
                                                    <option value="America/Indiana/Tell_City">America/Indiana/Tell_City</option>
                                                    <option value="America/Indiana/Vevay">America/Indiana/Vevay</option>
                                                    <option value="America/Indiana/Vincennes">America/Indiana/Vincennes</option>
                                                    <option value="America/Indiana/Winamac">America/Indiana/Winamac</option>
                                                    <option value="America/Indianapolis">America/Indianapolis</option>
                                                    <option value="America/Iqaluit">America/Iqaluit</option>
                                                    <option value="America/Kentucky/Louisville">America/Kentucky/Louisville</option>
                                                    <option value="America/Kentucky/Monticello">America/Kentucky/Monticello</option>
                                                    <option value="America/Knox_IN">America/Knox_IN</option>
                                                    <option value="America/Louisville">America/Louisville</option>
                                                    <option value="America/Managua">America/Managua</option>
                                                    <option value="America/Matamoros">America/Matamoros</option>
                                                    <option value="America/Menominee">America/Menominee</option>
                                                    <option value="America/Merida">America/Merida</option>
                                                    <option value="America/Mexico_City">America/Mexico_City</option>
                                                    <option value="America/Monterrey">America/Monterrey</option>
                                                    <option value="America/North_Dakota/Beulah">America/North_Dakota/Beulah</option>
                                                    <option value="America/North_Dakota/Center">America/North_Dakota/Center</option>
                                                    <option value="America/North_Dakota/New_Salem">America/North_Dakota/New_Salem</option>
                                                    <option value="America/Ojinaga">America/Ojinaga</option>
                                                    <option value="America/Pangnirtung">America/Pangnirtung</option>
                                                    <option value="America/Rainy_River">America/Rainy_River</option>
                                                    <option value="America/Rankin_Inlet">America/Rankin_Inlet</option>
                                                    <option value="America/Resolute">America/Resolute</option>
                                                    <option value="America/Tegucigalpa">America/Tegucigalpa</option>
                                                    <option value="America/Winnipeg">America/Winnipeg</option>
                                                    <option value="Canada/Central">Canada/Central</option>
                                                    <option value="Mexico/General">Mexico/General</option>
                                                    <option value="Asia/Chongqing">Asia/Chongqing</option>
                                                    <option value="Asia/Chungking">Asia/Chungking</option>
                                                    <option value="Asia/Harbin">Asia/Harbin</option>
                                                    <option value="Asia/Macao">Asia/Macao</option>
                                                    <option value="Asia/Macau">Asia/Macau</option>
                                                    <option value="Asia/Taipei">Asia/Taipei</option>
                                                    <option value="PRC">PRC</option>
                                                    <option value="ROC">ROC</option>
                                                    <option value="Europe/Berlin">Europe/Berlin</option>
                                                    <option value="Europe/Berlin">Europe/Berlin</option>
                                                    <option value="Europe/Kaliningrad">Europe/Kaliningrad</option>
                                                    <option value="Africa/Algiers">Africa/Algiers</option>
                                                    <option value="Africa/Ceuta">Africa/Ceuta</option>
                                                    <option value="Africa/Tripoli">Africa/Tripoli</option>
                                                    <option value="Africa/Tunis">Africa/Tunis</option>
                                                    <option value="Arctic/Longyearbyen">Arctic/Longyearbyen</option>
                                                    <option value="Atlantic/Jan_Mayen">Atlantic/Jan_Mayen</option>
                                                    <option value="Europe/Amsterdam">Europe/Amsterdam</option>
                                                    <option value="Europe/Andorra">Europe/Andorra</option>
                                                    <option value="Europe/Athens">Europe/Athens</option>
                                                    <option value="Europe/Belgrade">Europe/Belgrade</option>
                                                    <option value="Europe/Bratislava">Europe/Bratislava</option>
                                                    <option value="Europe/Brussels">Europe/Brussels</option>
                                                    <option value="Europe/Budapest">Europe/Budapest</option>
                                                    <option value="Europe/Busingen">Europe/Busingen</option>
                                                    <option value="Europe/Chisinau">Europe/Chisinau</option>
                                                    <option value="Europe/Copenhagen">Europe/Copenhagen</option>
                                                    <option value="Europe/Gibraltar">Europe/Gibraltar</option>
                                                    <option value="Europe/Kaliningrad">Europe/Kaliningrad</option>
                                                    <option value="Europe/Kiev">Europe/Kiev</option>
                                                    <option value="Europe/Lisbon">Europe/Lisbon</option>
                                                    <option value="Europe/Ljubljana">Europe/Ljubljana</option>
                                                    <option value="Europe/Luxembourg">Europe/Luxembourg</option>
                                                    <option value="Europe/Madrid">Europe/Madrid</option>
                                                    <option value="Europe/Malta">Europe/Malta</option>
                                                    <option value="Europe/Minsk">Europe/Minsk</option>
                                                    <option value="Europe/Monaco">Europe/Monaco</option>
                                                    <option value="Europe/Oslo">Europe/Oslo</option>
                                                    <option value="Europe/Paris">Europe/Paris</option>
                                                    <option value="Europe/Podgorica">Europe/Podgorica</option>
                                                    <option value="Europe/Prague">Europe/Prague</option>
                                                    <option value="Europe/Riga">Europe/Riga</option>
                                                    <option value="Europe/Rome">Europe/Rome</option>
                                                    <option value="Europe/San_Marino">Europe/San_Marino</option>
                                                    <option value="Europe/Sarajevo">Europe/Sarajevo</option>
                                                    <option value="Europe/Simferopol">Europe/Simferopol</option>
                                                    <option value="Europe/Skopje">Europe/Skopje</option>
                                                    <option value="Europe/Sofia">Europe/Sofia</option>
                                                    <option value="Europe/Stockholm">Europe/Stockholm</option>
                                                    <option value="Europe/Tallinn">Europe/Tallinn</option>
                                                    <option value="Europe/Tirane">Europe/Tirane</option>
                                                    <option value="Europe/Tiraspol">Europe/Tiraspol</option>
                                                    <option value="Europe/Uzhgorod">Europe/Uzhgorod</option>
                                                    <option value="Europe/Vaduz">Europe/Vaduz</option>
                                                    <option value="Europe/Vatican">Europe/Vatican</option>
                                                    <option value="Europe/Vienna">Europe/Vienna</option>
                                                    <option value="Europe/Vilnius">Europe/Vilnius</option>
                                                    <option value="Europe/Warsaw">Europe/Warsaw</option>
                                                    <option value="Europe/Zagreb">Europe/Zagreb</option>
                                                    <option value="Europe/Zaporozhye">Europe/Zaporozhye</option>
                                                    <option value="Europe/Zurich">Europe/Zurich</option>
                                                    <option value="Europe/Berlin">Europe/Berlin</option>
                                                    <option value="Europe/Kaliningrad">Europe/Kaliningrad</option>
                                                    <option value="Africa/Algiers">Africa/Algiers</option>
                                                    <option value="Africa/Casablanca">Africa/Casablanca</option>
                                                    <option value="Africa/Ceuta">Africa/Ceuta</option>
                                                    <option value="Africa/Tripoli">Africa/Tripoli</option>
                                                    <option value="Africa/Tunis">Africa/Tunis</option>
                                                    <option value="Arctic/Longyearbyen">Arctic/Longyearbyen</option>
                                                    <option value="Atlantic/Jan_Mayen">Atlantic/Jan_Mayen</option>
                                                    <option value="Europe/Amsterdam">Europe/Amsterdam</option>
                                                    <option value="Europe/Andorra">Europe/Andorra</option>
                                                    <option value="Europe/Athens">Europe/Athens</option>
                                                    <option value="Europe/Belgrade">Europe/Belgrade</option>
                                                    <option value="Europe/Bratislava">Europe/Bratislava</option>
                                                    <option value="Europe/Brussels">Europe/Brussels</option>
                                                    <option value="Europe/Budapest">Europe/Budapest</option>
                                                    <option value="Europe/Busingen">Europe/Busingen</option>
                                                    <option value="Europe/Chisinau">Europe/Chisinau</option>
                                                    <option value="Europe/Copenhagen">Europe/Copenhagen</option>
                                                    <option value="Europe/Gibraltar">Europe/Gibraltar</option>
                                                    <option value="Europe/Kaliningrad">Europe/Kaliningrad</option>
                                                    <option value="Europe/Kiev">Europe/Kiev</option>
                                                    <option value="Europe/Lisbon">Europe/Lisbon</option>
                                                    <option value="Europe/Ljubljana">Europe/Ljubljana</option>
                                                    <option value="Europe/Luxembourg">Europe/Luxembourg</option>
                                                    <option value="Europe/Madrid">Europe/Madrid</option>
                                                    <option value="Europe/Malta">Europe/Malta</option>
                                                    <option value="Europe/Minsk">Europe/Minsk</option>
                                                    <option value="Europe/Monaco">Europe/Monaco</option>
                                                    <option value="Europe/Oslo">Europe/Oslo</option>
                                                    <option value="Europe/Paris">Europe/Paris</option>
                                                    <option value="Europe/Podgorica">Europe/Podgorica</option>
                                                    <option value="Europe/Prague">Europe/Prague</option>
                                                    <option value="Europe/Riga">Europe/Riga</option>
                                                    <option value="Europe/Rome">Europe/Rome</option>
                                                    <option value="Europe/San_Marino">Europe/San_Marino</option>
                                                    <option value="Europe/Sarajevo">Europe/Sarajevo</option>
                                                    <option value="Europe/Simferopol">Europe/Simferopol</option>
                                                    <option value="Europe/Skopje">Europe/Skopje</option>
                                                    <option value="Europe/Sofia">Europe/Sofia</option>
                                                    <option value="Europe/Stockholm">Europe/Stockholm</option>
                                                    <option value="Europe/Tallinn">Europe/Tallinn</option>
                                                    <option value="Europe/Tirane">Europe/Tirane</option>
                                                    <option value="Europe/Tiraspol">Europe/Tiraspol</option>
                                                    <option value="Europe/Uzhgorod">Europe/Uzhgorod</option>
                                                    <option value="Europe/Vaduz">Europe/Vaduz</option>
                                                    <option value="Europe/Vatican">Europe/Vatican</option>
                                                    <option value="Europe/Vienna">Europe/Vienna</option>
                                                    <option value="Europe/Vilnius">Europe/Vilnius</option>
                                                    <option value="Europe/Warsaw">Europe/Warsaw</option>
                                                    <option value="Europe/Zagreb">Europe/Zagreb</option>
                                                    <option value="Europe/Zaporozhye">Europe/Zaporozhye</option>
                                                    <option value="Europe/Zurich">Europe/Zurich</option>
                                                    <option value="America/Argentina/Buenos_Aires">America/Argentina/Buenos_Aires</option>
                                                    <option value="America/Argentina/Catamarca">America/Argentina/Catamarca</option>
                                                    <option value="America/Argentina/ComodRivadavia">America/Argentina/ComodRivadavia</option>
                                                    <option value="America/Argentina/Cordoba">America/Argentina/Cordoba</option>
                                                    <option value="America/Argentina/Jujuy">America/Argentina/Jujuy</option>
                                                    <option value="America/Argentina/La_Rioja">America/Argentina/La_Rioja</option>
                                                    <option value="America/Argentina/Mendoza">America/Argentina/Mendoza</option>
                                                    <option value="America/Argentina/Rio_Gallegos">America/Argentina/Rio_Gallegos</option>
                                                    <option value="America/Argentina/Salta">America/Argentina/Salta</option>
                                                    <option value="America/Argentina/San_Juan">America/Argentina/San_Juan</option>
                                                    <option value="America/Argentina/San_Luis">America/Argentina/San_Luis</option>
                                                    <option value="America/Argentina/Tucuman">America/Argentina/Tucuman</option>
                                                    <option value="America/Argentina/Ushuaia">America/Argentina/Ushuaia</option>
                                                    <option value="America/Buenos_Aires">America/Buenos_Aires</option>
                                                    <option value="America/Catamarca">America/Catamarca</option>
                                                    <option value="America/Cordoba">America/Cordoba</option>
                                                    <option value="America/Jujuy">America/Jujuy</option>
                                                    <option value="America/Mendoza">America/Mendoza</option>
                                                    <option value="America/Rosario">America/Rosario</option>
                                                    <option value="America/Caracas">America/Caracas</option>
                                                    <option value="America/La_Paz">America/La_Paz</option>
                                                    <option value="America/Cayman">America/Cayman</option>
                                                    <option value="America/Panama">America/Panama</option>
                                                    <option value="Europe/Copenhagen">Europe/Copenhagen</option>
                                                    <option value="Europe/Chisinau">Europe/Chisinau</option>
                                                    <option value="Europe/Tiraspol">Europe/Tiraspol</option>
                                                    <option value="America/Chicago">America/Chicago</option>
                                                    <option value="America/Atikokan">America/Atikokan</option>
                                                    <option value="America/Coral_Harbour">America/Coral_Harbour</option>
                                                    <option value="America/Fort_Wayne">America/Fort_Wayne</option>
                                                    <option value="America/Indiana/Indianapolis">America/Indiana/Indianapolis</option>
                                                    <option value="America/Indiana/Knox">America/Indiana/Knox</option>
                                                    <option value="America/Indiana/Marengo">America/Indiana/Marengo</option>
                                                    <option value="America/Indiana/Petersburg">America/Indiana/Petersburg</option>
                                                    <option value="America/Indiana/Tell_City">America/Indiana/Tell_City</option>
                                                    <option value="America/Indiana/Vevay">America/Indiana/Vevay</option>
                                                    <option value="America/Indiana/Vincennes">America/Indiana/Vincennes</option>
                                                    <option value="America/Indiana/Winamac">America/Indiana/Winamac</option>
                                                    <option value="America/Indianapolis">America/Indianapolis</option>
                                                    <option value="America/Kentucky/Louisville">America/Kentucky/Louisville</option>
                                                    <option value="America/Kentucky/Monticello">America/Kentucky/Monticello</option>
                                                    <option value="America/Knox_IN">America/Knox_IN</option>
                                                    <option value="America/Louisville">America/Louisville</option>
                                                    <option value="America/Menominee">America/Menominee</option>
                                                    <option value="America/Rainy_River">America/Rainy_River</option>
                                                    <option value="America/Winnipeg">America/Winnipeg</option>
                                                    <option value="Canada/Central">Canada/Central</option>
                                                    <option value="America/Chicago">America/Chicago</option>
                                                    <option value="America/Havana">America/Havana</option>
                                                    <option value="America/Atikokan">America/Atikokan</option>
                                                    <option value="America/Bahia_Banderas">America/Bahia_Banderas</option>
                                                    <option value="America/Belize">America/Belize</option>
                                                    <option value="America/Cambridge_Bay">America/Cambridge_Bay</option>
                                                    <option value="America/Cancun">America/Cancun</option>
                                                    <option value="America/Chihuahua">America/Chihuahua</option>
                                                    <option value="America/Coral_Harbour">America/Coral_Harbour</option>
                                                    <option value="America/Costa_Rica">America/Costa_Rica</option>
                                                    <option value="America/Detroit">America/Detroit</option>
                                                    <option value="America/El_Salvador">America/El_Salvador</option>
                                                    <option value="America/Fort_Wayne">America/Fort_Wayne</option>
                                                    <option value="America/Guatemala">America/Guatemala</option>
                                                    <option value="America/Hermosillo">America/Hermosillo</option>
                                                    <option value="America/Indiana/Indianapolis">America/Indiana/Indianapolis</option>
                                                    <option value="America/Indiana/Knox">America/Indiana/Knox</option>
                                                    <option value="America/Indiana/Marengo">America/Indiana/Marengo</option>
                                                    <option value="America/Indiana/Petersburg">America/Indiana/Petersburg</option>
                                                    <option value="America/Indiana/Tell_City">America/Indiana/Tell_City</option>
                                                    <option value="America/Indiana/Vevay">America/Indiana/Vevay</option>
                                                    <option value="America/Indiana/Vincennes">America/Indiana/Vincennes</option>
                                                    <option value="America/Indiana/Winamac">America/Indiana/Winamac</option>
                                                    <option value="America/Indianapolis">America/Indianapolis</option>
                                                    <option value="America/Iqaluit">America/Iqaluit</option>
                                                    <option value="America/Kentucky/Louisville">America/Kentucky/Louisville</option>
                                                    <option value="America/Kentucky/Monticello">America/Kentucky/Monticello</option>
                                                    <option value="America/Knox_IN">America/Knox_IN</option>
                                                    <option value="America/Louisville">America/Louisville</option>
                                                    <option value="America/Managua">America/Managua</option>
                                                    <option value="America/Matamoros">America/Matamoros</option>
                                                    <option value="America/Mazatlan">America/Mazatlan</option>
                                                    <option value="America/Menominee">America/Menominee</option>
                                                    <option value="America/Merida">America/Merida</option>
                                                    <option value="America/Mexico_City">America/Mexico_City</option>
                                                    <option value="America/Monterrey">America/Monterrey</option>
                                                    <option value="America/North_Dakota/Beulah">America/North_Dakota/Beulah</option>
                                                    <option value="America/North_Dakota/Center">America/North_Dakota/Center</option>
                                                    <option value="America/North_Dakota/New_Salem">America/North_Dakota/New_Salem</option>
                                                    <option value="America/Ojinaga">America/Ojinaga</option>
                                                    <option value="America/Pangnirtung">America/Pangnirtung</option>
                                                    <option value="America/Rainy_River">America/Rainy_River</option>
                                                    <option value="America/Rankin_Inlet">America/Rankin_Inlet</option>
                                                    <option value="America/Regina">America/Regina</option>
                                                    <option value="America/Resolute">America/Resolute</option>
                                                    <option value="America/Swift_Current">America/Swift_Current</option>
                                                    <option value="America/Tegucigalpa">America/Tegucigalpa</option>
                                                    <option value="America/Thunder_Bay">America/Thunder_Bay</option>
                                                    <option value="America/Winnipeg">America/Winnipeg</option>
                                                    <option value="Canada/Central">Canada/Central</option>
                                                    <option value="Canada/Saskatchewan">Canada/Saskatchewan</option>
                                                    <option value="Mexico/BajaSur">Mexico/BajaSur</option>
                                                    <option value="Mexico/General">Mexico/General</option>
                                                    <option value="Asia/Chongqing">Asia/Chongqing</option>
                                                    <option value="Asia/Chungking">Asia/Chungking</option>
                                                    <option value="Asia/Harbin">Asia/Harbin</option>
                                                    <option value="Asia/Macao">Asia/Macao</option>
                                                    <option value="Asia/Macau">Asia/Macau</option>
                                                    <option value="Asia/Shanghai">Asia/Shanghai</option>
                                                    <option value="Asia/Taipei">Asia/Taipei</option>
                                                    <option value="PRC">PRC</option>
                                                    <option value="ROC">ROC</option>
                                                    <option value="America/Chicago">America/Chicago</option>
                                                    <option value="America/Atikokan">America/Atikokan</option>
                                                    <option value="America/Coral_Harbour">America/Coral_Harbour</option>
                                                    <option value="America/Fort_Wayne">America/Fort_Wayne</option>
                                                    <option value="America/Indiana/Indianapolis">America/Indiana/Indianapolis</option>
                                                    <option value="America/Indiana/Knox">America/Indiana/Knox</option>
                                                    <option value="America/Indiana/Marengo">America/Indiana/Marengo</option>
                                                    <option value="America/Indiana/Petersburg">America/Indiana/Petersburg</option>
                                                    <option value="America/Indiana/Tell_City">America/Indiana/Tell_City</option>
                                                    <option value="America/Indiana/Vevay">America/Indiana/Vevay</option>
                                                    <option value="America/Indiana/Vincennes">America/Indiana/Vincennes</option>
                                                    <option value="America/Indiana/Winamac">America/Indiana/Winamac</option>
                                                    <option value="America/Indianapolis">America/Indianapolis</option>
                                                    <option value="America/Kentucky/Louisville">America/Kentucky/Louisville</option>
                                                    <option value="America/Kentucky/Monticello">America/Kentucky/Monticello</option>
                                                    <option value="America/Knox_IN">America/Knox_IN</option>
                                                    <option value="America/Louisville">America/Louisville</option>
                                                    <option value="America/Menominee">America/Menominee</option>
                                                    <option value="America/Mexico_City">America/Mexico_City</option>
                                                    <option value="America/Rainy_River">America/Rainy_River</option>
                                                    <option value="America/Winnipeg">America/Winnipeg</option>
                                                    <option value="Canada/Central">Canada/Central</option>
                                                    <option value="Mexico/General">Mexico/General</option>
                                                    <option value="Pacific/Guam">Pacific/Guam</option>
                                                    <option value="Pacific/Saipan">Pacific/Saipan</option>
                                                    <option value="Europe/Dublin">Europe/Dublin</option>
                                                    <option value="Africa/Khartoum">Africa/Khartoum</option>
                                                    <option value="Africa/Addis_Ababa">Africa/Addis_Ababa</option>
                                                    <option value="Africa/Asmara">Africa/Asmara</option>
                                                    <option value="Africa/Asmera">Africa/Asmera</option>
                                                    <option value="Africa/Dar_es_Salaam">Africa/Dar_es_Salaam</option>
                                                    <option value="Africa/Djibouti">Africa/Djibouti</option>
                                                    <option value="Africa/Juba">Africa/Juba</option>
                                                    <option value="Africa/Kampala">Africa/Kampala</option>
                                                    <option value="Africa/Mogadishu">Africa/Mogadishu</option>
                                                    <option value="Africa/Nairobi">Africa/Nairobi</option>
                                                    <option value="Indian/Antananarivo">Indian/Antananarivo</option>
                                                    <option value="Indian/Comoro">Indian/Comoro</option>
                                                    <option value="Indian/Mayotte">Indian/Mayotte</option>
                                                    <option value="America/Iqaluit">America/Iqaluit</option>
                                                    <option value="America/New_York">America/New_York</option>
                                                    <option value="America/Cancun">America/Cancun</option>
                                                    <option value="America/Detroit">America/Detroit</option>
                                                    <option value="America/Fort_Wayne">America/Fort_Wayne</option>
                                                    <option value="America/Grand_Turk">America/Grand_Turk</option>
                                                    <option value="America/Indiana/Indianapolis">America/Indiana/Indianapolis</option>
                                                    <option value="America/Indiana/Marengo">America/Indiana/Marengo</option>
                                                    <option value="America/Indiana/Petersburg">America/Indiana/Petersburg</option>
                                                    <option value="America/Indiana/Tell_City">America/Indiana/Tell_City</option>
                                                    <option value="America/Indiana/Vevay">America/Indiana/Vevay</option>
                                                    <option value="America/Indiana/Vincennes">America/Indiana/Vincennes</option>
                                                    <option value="America/Indiana/Winamac">America/Indiana/Winamac</option>
                                                    <option value="America/Indianapolis">America/Indianapolis</option>
                                                    <option value="America/Iqaluit">America/Iqaluit</option>
                                                    <option value="America/Jamaica">America/Jamaica</option>
                                                    <option value="America/Kentucky/Louisville">America/Kentucky/Louisville</option>
                                                    <option value="America/Kentucky/Monticello">America/Kentucky/Monticello</option>
                                                    <option value="America/Louisville">America/Louisville</option>
                                                    <option value="America/Montreal">America/Montreal</option>
                                                    <option value="America/Nassau">America/Nassau</option>
                                                    <option value="America/Nipigon">America/Nipigon</option>
                                                    <option value="America/Pangnirtung">America/Pangnirtung</option>
                                                    <option value="America/Port-au-Prince">America/Port-au-Prince</option>
                                                    <option value="America/Santo_Domingo">America/Santo_Domingo</option>
                                                    <option value="America/Thunder_Bay">America/Thunder_Bay</option>
                                                    <option value="America/Toronto">America/Toronto</option>
                                                    <option value="Canada/Eastern">Canada/Eastern</option>
                                                    <option value="Europe/Helsinki">Europe/Helsinki</option>
                                                    <option value="Africa/Cairo">Africa/Cairo</option>
                                                    <option value="Asia/Amman">Asia/Amman</option>
                                                    <option value="Asia/Beirut">Asia/Beirut</option>
                                                    <option value="Asia/Damascus">Asia/Damascus</option>
                                                    <option value="Asia/Famagusta">Asia/Famagusta</option>
                                                    <option value="Asia/Gaza">Asia/Gaza</option>
                                                    <option value="Asia/Hebron">Asia/Hebron</option>
                                                    <option value="Asia/Istanbul">Asia/Istanbul</option>
                                                    <option value="Asia/Nicosia">Asia/Nicosia</option>
                                                    <option value="Europe/Athens">Europe/Athens</option>
                                                    <option value="Europe/Bucharest">Europe/Bucharest</option>
                                                    <option value="Europe/Chisinau">Europe/Chisinau</option>
                                                    <option value="Europe/Istanbul">Europe/Istanbul</option>
                                                    <option value="Europe/Kaliningrad">Europe/Kaliningrad</option>
                                                    <option value="Europe/Kiev">Europe/Kiev</option>
                                                    <option value="Europe/Mariehamn">Europe/Mariehamn</option>
                                                    <option value="Europe/Minsk">Europe/Minsk</option>
                                                    <option value="Europe/Moscow">Europe/Moscow</option>
                                                    <option value="Europe/Nicosia">Europe/Nicosia</option>
                                                    <option value="Europe/Riga">Europe/Riga</option>
                                                    <option value="Europe/Simferopol">Europe/Simferopol</option>
                                                    <option value="Europe/Sofia">Europe/Sofia</option>
                                                    <option value="Europe/Tallinn">Europe/Tallinn</option>
                                                    <option value="Europe/Tiraspol">Europe/Tiraspol</option>
                                                    <option value="Europe/Uzhgorod">Europe/Uzhgorod</option>
                                                    <option value="Europe/Vilnius">Europe/Vilnius</option>
                                                    <option value="Europe/Warsaw">Europe/Warsaw</option>
                                                    <option value="Europe/Zaporozhye">Europe/Zaporozhye</option>
                                                    <option value="Europe/Helsinki">Europe/Helsinki</option>
                                                    <option value="Africa/Cairo">Africa/Cairo</option>
                                                    <option value="Africa/Tripoli">Africa/Tripoli</option>
                                                    <option value="Asia/Amman">Asia/Amman</option>
                                                    <option value="Asia/Beirut">Asia/Beirut</option>
                                                    <option value="Asia/Damascus">Asia/Damascus</option>
                                                    <option value="Asia/Famagusta">Asia/Famagusta</option>
                                                    <option value="Asia/Gaza">Asia/Gaza</option>
                                                    <option value="Asia/Hebron">Asia/Hebron</option>
                                                    <option value="Asia/Istanbul">Asia/Istanbul</option>
                                                    <option value="Asia/Nicosia">Asia/Nicosia</option>
                                                    <option value="Europe/Athens">Europe/Athens</option>
                                                    <option value="Europe/Bucharest">Europe/Bucharest</option>
                                                    <option value="Europe/Chisinau">Europe/Chisinau</option>
                                                    <option value="Europe/Istanbul">Europe/Istanbul</option>
                                                    <option value="Europe/Kaliningrad">Europe/Kaliningrad</option>
                                                    <option value="Europe/Kiev">Europe/Kiev</option>
                                                    <option value="Europe/Mariehamn">Europe/Mariehamn</option>
                                                    <option value="Europe/Minsk">Europe/Minsk</option>
                                                    <option value="Europe/Moscow">Europe/Moscow</option>
                                                    <option value="Europe/Nicosia">Europe/Nicosia</option>
                                                    <option value="Europe/Riga">Europe/Riga</option>
                                                    <option value="Europe/Simferopol">Europe/Simferopol</option>
                                                    <option value="Europe/Sofia">Europe/Sofia</option>
                                                    <option value="Europe/Tallinn">Europe/Tallinn</option>
                                                    <option value="Europe/Tiraspol">Europe/Tiraspol</option>
                                                    <option value="Europe/Uzhgorod">Europe/Uzhgorod</option>
                                                    <option value="Europe/Vilnius">Europe/Vilnius</option>
                                                    <option value="Europe/Warsaw">Europe/Warsaw</option>
                                                    <option value="Europe/Zaporozhye">Europe/Zaporozhye</option>
                                                    <option value="Chile/EasterIsland">Chile/EasterIsland</option>
                                                    <option value="Pacific/Easter">Pacific/Easter</option>
                                                    <option value="America/New_York">America/New_York</option>
                                                    <option value="America/Detroit">America/Detroit</option>
                                                    <option value="America/Iqaluit">America/Iqaluit</option>
                                                    <option value="America/Montreal">America/Montreal</option>
                                                    <option value="America/Nipigon">America/Nipigon</option>
                                                    <option value="America/Thunder_Bay">America/Thunder_Bay</option>
                                                    <option value="America/Toronto">America/Toronto</option>
                                                    <option value="Canada/Eastern">Canada/Eastern</option>
                                                    <option value="America/New_York">America/New_York</option>
                                                    <option value="America/Atikokan">America/Atikokan</option>
                                                    <option value="America/Cambridge_Bay">America/Cambridge_Bay</option>
                                                    <option value="America/Cancun">America/Cancun</option>
                                                    <option value="America/Cayman">America/Cayman</option>
                                                    <option value="America/Chicago">America/Chicago</option>
                                                    <option value="America/Coral_Harbour">America/Coral_Harbour</option>
                                                    <option value="America/Detroit">America/Detroit</option>
                                                    <option value="America/Fort_Wayne">America/Fort_Wayne</option>
                                                    <option value="America/Grand_Turk">America/Grand_Turk</option>
                                                    <option value="America/Indiana/Indianapolis">America/Indiana/Indianapolis</option>
                                                    <option value="America/Indiana/Knox">America/Indiana/Knox</option>
                                                    <option value="America/Indiana/Marengo">America/Indiana/Marengo</option>
                                                    <option value="America/Indiana/Petersburg">America/Indiana/Petersburg</option>
                                                    <option value="America/Indiana/Tell_City">America/Indiana/Tell_City</option>
                                                    <option value="America/Indiana/Vevay">America/Indiana/Vevay</option>
                                                    <option value="America/Indiana/Vincennes">America/Indiana/Vincennes</option>
                                                    <option value="America/Indiana/Winamac">America/Indiana/Winamac</option>
                                                    <option value="America/Indianapolis">America/Indianapolis</option>
                                                    <option value="America/Iqaluit">America/Iqaluit</option>
                                                    <option value="America/Jamaica">America/Jamaica</option>
                                                    <option value="America/Kentucky/Louisville">America/Kentucky/Louisville</option>
                                                    <option value="America/Kentucky/Monticello">America/Kentucky/Monticello</option>
                                                    <option value="America/Knox_IN">America/Knox_IN</option>
                                                    <option value="America/Louisville">America/Louisville</option>
                                                    <option value="America/Managua">America/Managua</option>
                                                    <option value="America/Menominee">America/Menominee</option>
                                                    <option value="America/Merida">America/Merida</option>
                                                    <option value="America/Moncton">America/Moncton</option>
                                                    <option value="America/Montreal">America/Montreal</option>
                                                    <option value="America/Nassau">America/Nassau</option>
                                                    <option value="America/Nipigon">America/Nipigon</option>
                                                    <option value="America/Panama">America/Panama</option>
                                                    <option value="America/Pangnirtung">America/Pangnirtung</option>
                                                    <option value="America/Port-au-Prince">America/Port-au-Prince</option>
                                                    <option value="America/Rankin_Inlet">America/Rankin_Inlet</option>
                                                    <option value="America/Resolute">America/Resolute</option>
                                                    <option value="America/Santo_Domingo">America/Santo_Domingo</option>
                                                    <option value="America/Thunder_Bay">America/Thunder_Bay</option>
                                                    <option value="America/Toronto">America/Toronto</option>
                                                    <option value="Canada/Eastern">Canada/Eastern</option>
                                                    <option value="America/New_York">America/New_York</option>
                                                    <option value="America/Detroit">America/Detroit</option>
                                                    <option value="America/Iqaluit">America/Iqaluit</option>
                                                    <option value="America/Montreal">America/Montreal</option>
                                                    <option value="America/Nipigon">America/Nipigon</option>
                                                    <option value="America/Thunder_Bay">America/Thunder_Bay</option>
                                                    <option value="America/Toronto">America/Toronto</option>
                                                    <option value="Canada/Eastern">Canada/Eastern</option>
                                                    <option value="America/Martinique">America/Martinique</option>
                                                    <option value="Atlantic/Madeira">Atlantic/Madeira</option>
                                                    <option value="Africa/Abidjan">Africa/Abidjan</option>
                                                    <option value="Africa/Accra">Africa/Accra</option>
                                                    <option value="Africa/Bamako">Africa/Bamako</option>
                                                    <option value="Africa/Banjul">Africa/Banjul</option>
                                                    <option value="Africa/Bissau">Africa/Bissau</option>
                                                    <option value="Africa/Conakry">Africa/Conakry</option>
                                                    <option value="Africa/Dakar">Africa/Dakar</option>
                                                    <option value="Africa/Freetown">Africa/Freetown</option>
                                                    <option value="Africa/Lome">Africa/Lome</option>
                                                    <option value="Africa/Monrovia">Africa/Monrovia</option>
                                                    <option value="Africa/Nouakchott">Africa/Nouakchott</option>
                                                    <option value="Africa/Ouagadougou">Africa/Ouagadougou</option>
                                                    <option value="Africa/Sao_Tome">Africa/Sao_Tome</option>
                                                    <option value="Africa/Timbuktu">Africa/Timbuktu</option>
                                                    <option value="America/Danmarkshavn">America/Danmarkshavn</option>
                                                    <option value="Atlantic/Reykjavik">Atlantic/Reykjavik</option>
                                                    <option value="Atlantic/St_Helena">Atlantic/St_Helena</option>
                                                    <option value="Etc/GMT">Etc/GMT</option>
                                                    <option value="Etc/Greenwich">Etc/Greenwich</option>
                                                    <option value="Europe/Belfast">Europe/Belfast</option>
                                                    <option value="Europe/Dublin">Europe/Dublin</option>
                                                    <option value="Europe/Gibraltar">Europe/Gibraltar</option>
                                                    <option value="Europe/Guernsey">Europe/Guernsey</option>
                                                    <option value="Europe/Isle_of_Man">Europe/Isle_of_Man</option>
                                                    <option value="Europe/Jersey">Europe/Jersey</option>
                                                    <option value="Europe/London">Europe/London</option>
                                                    <option value="GB">GB</option>
                                                    <option value="Pacific/Guam">Pacific/Guam</option>
                                                    <option value="Pacific/Saipan">Pacific/Saipan</option>
                                                    <option value="Pacific/Honolulu">Pacific/Honolulu</option>
                                                    <option value="America/Adak">America/Adak</option>
                                                    <option value="America/Atka">America/Atka</option>
                                                    <option value="Pacific/Johnston">Pacific/Johnston</option>
                                                    <option value="Asia/Hong_Kong">Asia/Hong_Kong</option>
                                                    <option value="Asia/Hong_Kong">Asia/Hong_Kong</option>
                                                    <option value="America/Havana">America/Havana</option>
                                                    <option value="Atlantic/Azores">Atlantic/Azores</option>
                                                    <option value="Asia/Calcutta">Asia/Calcutta</option>
                                                    <option value="Asia/Dacca">Asia/Dacca</option>
                                                    <option value="Asia/Dhaka">Asia/Dhaka</option>
                                                    <option value="Asia/Kolkata">Asia/Kolkata</option>
                                                    <option value="Europe/Helsinki">Europe/Helsinki</option>
                                                    <option value="Europe/Mariehamn">Europe/Mariehamn</option>
                                                    <option value="Pacific/Honolulu">Pacific/Honolulu</option>
                                                    <option value="Pacific/Honolulu">Pacific/Honolulu</option>
                                                    <option value="America/Adak">America/Adak</option>
                                                    <option value="America/Atka">America/Atka</option>
                                                    <option value="Pacific/Johnston">Pacific/Johnston</option>
                                                    <option value="Pacific/Johnston">Pacific/Johnston</option>
                                                    <option value="Asia/Jerusalem">Asia/Jerusalem</option>
                                                    <option value="Asia/Tel_Aviv">Asia/Tel_Aviv</option>
                                                    <option value="Asia/Jerusalem">Asia/Jerusalem</option>
                                                    <option value="Asia/Gaza">Asia/Gaza</option>
                                                    <option value="Asia/Hebron">Asia/Hebron</option>
                                                    <option value="Asia/Tel_Aviv">Asia/Tel_Aviv</option>
                                                    <option value="Asia/Irkutsk">Asia/Irkutsk</option>
                                                    <option value="Asia/Istanbul">Asia/Istanbul</option>
                                                    <option value="Europe/Istanbul">Europe/Istanbul</option>
                                                    <option value="Europe/Sofia">Europe/Sofia</option>
                                                    <option value="Asia/Jerusalem">Asia/Jerusalem</option>
                                                    <option value="Asia/Calcutta">Asia/Calcutta</option>
                                                    <option value="Asia/Kolkata">Asia/Kolkata</option>
                                                    <option value="Europe/Dublin">Europe/Dublin</option>
                                                    <option value="Europe/Dublin">Europe/Dublin</option>
                                                    <option value="Europe/Dublin">Europe/Dublin</option>
                                                    <option value="Asia/Gaza">Asia/Gaza</option>
                                                    <option value="Asia/Hebron">Asia/Hebron</option>
                                                    <option value="Asia/Tel_Aviv">Asia/Tel_Aviv</option>
                                                    <option value="Asia/Tokyo">Asia/Tokyo</option>
                                                    <option value="Asia/Jerusalem">Asia/Jerusalem</option>
                                                    <option value="Asia/Tel_Aviv">Asia/Tel_Aviv</option>
                                                    <option value="Asia/Tokyo">Asia/Tokyo</option>
                                                    <option value="Asia/Hong_Kong">Asia/Hong_Kong</option>
                                                    <option value="Asia/Pyongyang">Asia/Pyongyang</option>
                                                    <option value="Asia/Seoul">Asia/Seoul</option>
                                                    <option value="Asia/Taipei">Asia/Taipei</option>
                                                    <option value="ROC">ROC</option>
                                                    <option value="ROK">ROK</option>
                                                    <option value="Asia/Seoul">Asia/Seoul</option>
                                                    <option value="Asia/Seoul">Asia/Seoul</option>
                                                    <option value="ROK">ROK</option>
                                                    <option value="ROK">ROK</option>
                                                    <option value="Europe/Vilnius">Europe/Vilnius</option>
                                                    <option value="America/Grand_Turk">America/Grand_Turk</option>
                                                    <option value="America/Jamaica">America/Jamaica</option>
                                                    <option value="Europe/Kiev">Europe/Kiev</option>
                                                    <option value="Asia/Seoul">Asia/Seoul</option>
                                                    <option value="Asia/Pyongyang">Asia/Pyongyang</option>
                                                    <option value="Asia/Seoul">Asia/Seoul</option>
                                                    <option value="Asia/Pyongyang">Asia/Pyongyang</option>
                                                    <option value="ROK">ROK</option>
                                                    <option value="ROK">ROK</option>
                                                    <option value="Europe/Riga">Europe/Riga</option>
                                                    <option value="America/Cambridge_Bay">America/Cambridge_Bay</option>
                                                    <option value="America/Yellowknife">America/Yellowknife</option>
                                                    <option value="Europe/Moscow">Europe/Moscow</option>
                                                    <option value="America/Denver">America/Denver</option>
                                                    <option value="America/Bahia_Banderas">America/Bahia_Banderas</option>
                                                    <option value="America/Boise">America/Boise</option>
                                                    <option value="America/Cambridge_Bay">America/Cambridge_Bay</option>
                                                    <option value="America/Chihuahua">America/Chihuahua</option>
                                                    <option value="America/Edmonton">America/Edmonton</option>
                                                    <option value="America/Hermosillo">America/Hermosillo</option>
                                                    <option value="America/Inuvik">America/Inuvik</option>
                                                    <option value="America/Mazatlan">America/Mazatlan</option>
                                                    <option value="America/North_Dakota/Beulah">America/North_Dakota/Beulah</option>
                                                    <option value="America/North_Dakota/Center">America/North_Dakota/Center</option>
                                                    <option value="America/North_Dakota/New_Salem">America/North_Dakota/New_Salem</option>
                                                    <option value="America/Ojinaga">America/Ojinaga</option>
                                                    <option value="America/Phoenix">America/Phoenix</option>
                                                    <option value="America/Regina">America/Regina</option>
                                                    <option value="America/Shiprock">America/Shiprock</option>
                                                    <option value="America/Swift_Current">America/Swift_Current</option>
                                                    <option value="America/Yellowknife">America/Yellowknife</option>
                                                    <option value="Canada/Mountain">Canada/Mountain</option>
                                                    <option value="Canada/Saskatchewan">Canada/Saskatchewan</option>
                                                    <option value="Mexico/BajaSur">Mexico/BajaSur</option>
                                                    <option value="Europe/Moscow">Europe/Moscow</option>
                                                    <option value="Europe/Moscow">Europe/Moscow</option>
                                                    <option value="America/Montevideo">America/Montevideo</option>
                                                    <option value="America/Managua">America/Managua</option>
                                                    <option value="Africa/Monrovia">Africa/Monrovia</option>
                                                    <option value="Africa/Monrovia">Africa/Monrovia</option>
                                                    <option value="Indian/Maldives">Indian/Maldives</option>
                                                    <option value="Asia/Colombo">Asia/Colombo</option>
                                                    <option value="Asia/Calcutta">Asia/Calcutta</option>
                                                    <option value="Asia/Kolkata">Asia/Kolkata</option>
                                                    <option value="Asia/Makassar">Asia/Makassar</option>
                                                    <option value="Asia/Ujung_Pandang">Asia/Ujung_Pandang</option>
                                                    <option value="Europe/Minsk">Europe/Minsk</option>
                                                    <option value="America/Denver">America/Denver</option>
                                                    <option value="America/Boise">America/Boise</option>
                                                    <option value="America/Cambridge_Bay">America/Cambridge_Bay</option>
                                                    <option value="America/Edmonton">America/Edmonton</option>
                                                    <option value="America/North_Dakota/Beulah">America/North_Dakota/Beulah</option>
                                                    <option value="America/North_Dakota/Center">America/North_Dakota/Center</option>
                                                    <option value="America/North_Dakota/New_Salem">America/North_Dakota/New_Salem</option>
                                                    <option value="America/Regina">America/Regina</option>
                                                    <option value="America/Shiprock">America/Shiprock</option>
                                                    <option value="America/Swift_Current">America/Swift_Current</option>
                                                    <option value="America/Yellowknife">America/Yellowknife</option>
                                                    <option value="Canada/Mountain">Canada/Mountain</option>
                                                    <option value="Canada/Saskatchewan">Canada/Saskatchewan</option>
                                                    <option value="Europe/Moscow">Europe/Moscow</option>
                                                    <option value="Europe/Chisinau">Europe/Chisinau</option>
                                                    <option value="Europe/Kaliningrad">Europe/Kaliningrad</option>
                                                    <option value="Europe/Kiev">Europe/Kiev</option>
                                                    <option value="Europe/Minsk">Europe/Minsk</option>
                                                    <option value="Europe/Riga">Europe/Riga</option>
                                                    <option value="Europe/Simferopol">Europe/Simferopol</option>
                                                    <option value="Europe/Tallinn">Europe/Tallinn</option>
                                                    <option value="Europe/Tiraspol">Europe/Tiraspol</option>
                                                    <option value="Europe/Uzhgorod">Europe/Uzhgorod</option>
                                                    <option value="Europe/Vilnius">Europe/Vilnius</option>
                                                    <option value="Europe/Zaporozhye">Europe/Zaporozhye</option>
                                                    <option value="Europe/Moscow">Europe/Moscow</option>
                                                    <option value="Europe/Moscow">Europe/Moscow</option>
                                                    <option value="Europe/Chisinau">Europe/Chisinau</option>
                                                    <option value="Europe/Kaliningrad">Europe/Kaliningrad</option>
                                                    <option value="Europe/Kiev">Europe/Kiev</option>
                                                    <option value="Europe/Minsk">Europe/Minsk</option>
                                                    <option value="Europe/Riga">Europe/Riga</option>
                                                    <option value="Europe/Simferopol">Europe/Simferopol</option>
                                                    <option value="Europe/Tallinn">Europe/Tallinn</option>
                                                    <option value="Europe/Tiraspol">Europe/Tiraspol</option>
                                                    <option value="Europe/Uzhgorod">Europe/Uzhgorod</option>
                                                    <option value="Europe/Vilnius">Europe/Vilnius</option>
                                                    <option value="Europe/Zaporozhye">Europe/Zaporozhye</option>
                                                    <option value="Europe/Simferopol">Europe/Simferopol</option>
                                                    <option value="America/Denver">America/Denver</option>
                                                    <option value="America/Bahia_Banderas">America/Bahia_Banderas</option>
                                                    <option value="America/Boise">America/Boise</option>
                                                    <option value="America/Cambridge_Bay">America/Cambridge_Bay</option>
                                                    <option value="America/Chihuahua">America/Chihuahua</option>
                                                    <option value="America/Creston">America/Creston</option>
                                                    <option value="America/Dawson_Creek">America/Dawson_Creek</option>
                                                    <option value="America/Edmonton">America/Edmonton</option>
                                                    <option value="America/Ensenada">America/Ensenada</option>
                                                    <option value="America/Fort_Nelson">America/Fort_Nelson</option>
                                                    <option value="America/Hermosillo">America/Hermosillo</option>
                                                    <option value="America/Inuvik">America/Inuvik</option>
                                                    <option value="America/Mazatlan">America/Mazatlan</option>
                                                    <option value="America/Mexico_City">America/Mexico_City</option>
                                                    <option value="America/North_Dakota/Beulah">America/North_Dakota/Beulah</option>
                                                    <option value="America/North_Dakota/Center">America/North_Dakota/Center</option>
                                                    <option value="America/North_Dakota/New_Salem">America/North_Dakota/New_Salem</option>
                                                    <option value="America/Ojinaga">America/Ojinaga</option>
                                                    <option value="America/Phoenix">America/Phoenix</option>
                                                    <option value="America/Regina">America/Regina</option>
                                                    <option value="America/Santa_Isabel">America/Santa_Isabel</option>
                                                    <option value="America/Shiprock">America/Shiprock</option>
                                                    <option value="America/Swift_Current">America/Swift_Current</option>
                                                    <option value="America/Tijuana">America/Tijuana</option>
                                                    <option value="America/Yellowknife">America/Yellowknife</option>
                                                    <option value="Canada/Mountain">Canada/Mountain</option>
                                                    <option value="Canada/Saskatchewan">Canada/Saskatchewan</option>
                                                    <option value="Mexico/BajaNorte">Mexico/BajaNorte</option>
                                                    <option value="Mexico/BajaSur">Mexico/BajaSur</option>
                                                    <option value="Mexico/General">Mexico/General</option>
                                                    <option value="Europe/Moscow">Europe/Moscow</option>
                                                    <option value="America/Denver">America/Denver</option>
                                                    <option value="America/Boise">America/Boise</option>
                                                    <option value="America/Cambridge_Bay">America/Cambridge_Bay</option>
                                                    <option value="America/Edmonton">America/Edmonton</option>
                                                    <option value="America/North_Dakota/Beulah">America/North_Dakota/Beulah</option>
                                                    <option value="America/North_Dakota/Center">America/North_Dakota/Center</option>
                                                    <option value="America/North_Dakota/New_Salem">America/North_Dakota/New_Salem</option>
                                                    <option value="America/Phoenix">America/Phoenix</option>
                                                    <option value="America/Regina">America/Regina</option>
                                                    <option value="America/Shiprock">America/Shiprock</option>
                                                    <option value="America/Swift_Current">America/Swift_Current</option>
                                                    <option value="America/Yellowknife">America/Yellowknife</option>
                                                    <option value="Canada/Mountain">Canada/Mountain</option>
                                                    <option value="Canada/Saskatchewan">Canada/Saskatchewan</option>
                                                    <option value="America/St_Johns">America/St_Johns</option>
                                                    <option value="Canada/Newfoundland">Canada/Newfoundland</option>
                                                    <option value="America/St_Johns">America/St_Johns</option>
                                                    <option value="America/St_Johns">America/St_Johns</option>
                                                    <option value="America/Goose_Bay">America/Goose_Bay</option>
                                                    <option value="Canada/Newfoundland">Canada/Newfoundland</option>
                                                    <option value="America/Goose_Bay">America/Goose_Bay</option>
                                                    <option value="Canada/Newfoundland">Canada/Newfoundland</option>
                                                    <option value="America/St_Johns">America/St_Johns</option>
                                                    <option value="America/Adak">America/Adak</option>
                                                    <option value="America/Atka">America/Atka</option>
                                                    <option value="America/Nome">America/Nome</option>
                                                    <option value="America/Goose_Bay">America/Goose_Bay</option>
                                                    <option value="Canada/Newfoundland">Canada/Newfoundland</option>
                                                    <option value="America/St_Johns">America/St_Johns</option>
                                                    <option value="America/St_Johns">America/St_Johns</option>
                                                    <option value="Europe/Amsterdam">Europe/Amsterdam</option>
                                                    <option value="America/Goose_Bay">America/Goose_Bay</option>
                                                    <option value="Canada/Newfoundland">Canada/Newfoundland</option>
                                                    <option value="America/Goose_Bay">America/Goose_Bay</option>
                                                    <option value="Canada/Newfoundland">Canada/Newfoundland</option>
                                                    <option value="America/Adak">America/Adak</option>
                                                    <option value="America/Atka">America/Atka</option>
                                                    <option value="America/Nome">America/Nome</option>
                                                    <option value="America/St_Johns">America/St_Johns</option>
                                                    <option value="America/Adak">America/Adak</option>
                                                    <option value="America/Atka">America/Atka</option>
                                                    <option value="America/Nome">America/Nome</option>
                                                    <option value="America/Goose_Bay">America/Goose_Bay</option>
                                                    <option value="Canada/Newfoundland">Canada/Newfoundland</option>
                                                    <option value="Pacific/Auckland">Pacific/Auckland</option>
                                                    <option value="Antarctica/McMurdo">Antarctica/McMurdo</option>
                                                    <option value="Antarctica/South_Pole">Antarctica/South_Pole</option>
                                                    <option value="NZ">NZ</option>
                                                    <option value="Pacific/Auckland">Pacific/Auckland</option>
                                                    <option value="Antarctica/McMurdo">Antarctica/McMurdo</option>
                                                    <option value="Antarctica/South_Pole">Antarctica/South_Pole</option>
                                                    <option value="NZ">NZ</option>
                                                    <option value="Pacific/Auckland">Pacific/Auckland</option>
                                                    <option value="Pacific/Auckland">Pacific/Auckland</option>
                                                    <option value="Pacific/Auckland">Pacific/Auckland</option>
                                                    <option value="Antarctica/McMurdo">Antarctica/McMurdo</option>
                                                    <option value="Antarctica/South_Pole">Antarctica/South_Pole</option>
                                                    <option value="NZ">NZ</option>
                                                    <option value="Antarctica/McMurdo">Antarctica/McMurdo</option>
                                                    <option value="Antarctica/South_Pole">Antarctica/South_Pole</option>
                                                    <option value="NZ">NZ</option>
                                                    <option value="Antarctica/McMurdo">Antarctica/McMurdo</option>
                                                    <option value="Antarctica/South_Pole">Antarctica/South_Pole</option>
                                                    <option value="NZ">NZ</option>
                                                    <option value="America/Inuvik">America/Inuvik</option>
                                                    <option value="America/Los_Angeles">America/Los_Angeles</option>
                                                    <option value="America/Boise">America/Boise</option>
                                                    <option value="America/Dawson">America/Dawson</option>
                                                    <option value="America/Dawson_Creek">America/Dawson_Creek</option>
                                                    <option value="America/Ensenada">America/Ensenada</option>
                                                    <option value="America/Fort_Nelson">America/Fort_Nelson</option>
                                                    <option value="America/Juneau">America/Juneau</option>
                                                    <option value="America/Metlakatla">America/Metlakatla</option>
                                                    <option value="America/Santa_Isabel">America/Santa_Isabel</option>
                                                    <option value="America/Sitka">America/Sitka</option>
                                                    <option value="America/Tijuana">America/Tijuana</option>
                                                    <option value="America/Vancouver">America/Vancouver</option>
                                                    <option value="America/Whitehorse">America/Whitehorse</option>
                                                    <option value="Canada/Pacific">Canada/Pacific</option>
                                                    <option value="Canada/Yukon">Canada/Yukon</option>
                                                    <option value="Mexico/BajaNorte">Mexico/BajaNorte</option>
                                                    <option value="Asia/Karachi">Asia/Karachi</option>
                                                    <option value="Asia/Karachi">Asia/Karachi</option>
                                                    <option value="Asia/Ho_Chi_Minh">Asia/Ho_Chi_Minh</option>
                                                    <option value="Asia/Saigon">Asia/Saigon</option>
                                                    <option value="Pacific/Bougainville">Pacific/Bougainville</option>
                                                    <option value="Pacific/Port_Moresby">Pacific/Port_Moresby</option>
                                                    <option value="America/Paramaribo">America/Paramaribo</option>
                                                    <option value="America/Paramaribo">America/Paramaribo</option>
                                                    <option value="Asia/Yekaterinburg">Asia/Yekaterinburg</option>
                                                    <option value="Asia/Pontianak">Asia/Pontianak</option>
                                                    <option value="Europe/Bratislava">Europe/Bratislava</option>
                                                    <option value="Europe/Prague">Europe/Prague</option>
                                                    <option value="Africa/Algiers">Africa/Algiers</option>
                                                    <option value="Africa/Tunis">Africa/Tunis</option>
                                                    <option value="Europe/Monaco">Europe/Monaco</option>
                                                    <option value="Europe/Paris">Europe/Paris</option>
                                                    <option value="America/Port-au-Prince">America/Port-au-Prince</option>
                                                    <option value="America/Los_Angeles">America/Los_Angeles</option>
                                                    <option value="America/Dawson_Creek">America/Dawson_Creek</option>
                                                    <option value="America/Ensenada">America/Ensenada</option>
                                                    <option value="America/Fort_Nelson">America/Fort_Nelson</option>
                                                    <option value="America/Juneau">America/Juneau</option>
                                                    <option value="America/Metlakatla">America/Metlakatla</option>
                                                    <option value="America/Santa_Isabel">America/Santa_Isabel</option>
                                                    <option value="America/Sitka">America/Sitka</option>
                                                    <option value="America/Tijuana">America/Tijuana</option>
                                                    <option value="America/Vancouver">America/Vancouver</option>
                                                    <option value="Canada/Pacific">Canada/Pacific</option>
                                                    <option value="Mexico/BajaNorte">Mexico/BajaNorte</option>
                                                    <option value="America/Los_Angeles">America/Los_Angeles</option>
                                                    <option value="America/Bahia_Banderas">America/Bahia_Banderas</option>
                                                    <option value="America/Boise">America/Boise</option>
                                                    <option value="America/Creston">America/Creston</option>
                                                    <option value="America/Dawson">America/Dawson</option>
                                                    <option value="America/Dawson_Creek">America/Dawson_Creek</option>
                                                    <option value="America/Ensenada">America/Ensenada</option>
                                                    <option value="America/Fort_Nelson">America/Fort_Nelson</option>
                                                    <option value="America/Hermosillo">America/Hermosillo</option>
                                                    <option value="America/Inuvik">America/Inuvik</option>
                                                    <option value="America/Juneau">America/Juneau</option>
                                                    <option value="America/Mazatlan">America/Mazatlan</option>
                                                    <option value="America/Metlakatla">America/Metlakatla</option>
                                                    <option value="America/Santa_Isabel">America/Santa_Isabel</option>
                                                    <option value="America/Sitka">America/Sitka</option>
                                                    <option value="America/Tijuana">America/Tijuana</option>
                                                    <option value="America/Vancouver">America/Vancouver</option>
                                                    <option value="America/Whitehorse">America/Whitehorse</option>
                                                    <option value="Canada/Pacific">Canada/Pacific</option>
                                                    <option value="Canada/Yukon">Canada/Yukon</option>
                                                    <option value="Mexico/BajaNorte">Mexico/BajaNorte</option>
                                                    <option value="Mexico/BajaSur">Mexico/BajaSur</option>
                                                    <option value="America/Los_Angeles">America/Los_Angeles</option>
                                                    <option value="America/Dawson_Creek">America/Dawson_Creek</option>
                                                    <option value="America/Ensenada">America/Ensenada</option>
                                                    <option value="America/Fort_Nelson">America/Fort_Nelson</option>
                                                    <option value="America/Juneau">America/Juneau</option>
                                                    <option value="America/Metlakatla">America/Metlakatla</option>
                                                    <option value="America/Santa_Isabel">America/Santa_Isabel</option>
                                                    <option value="America/Sitka">America/Sitka</option>
                                                    <option value="America/Tijuana">America/Tijuana</option>
                                                    <option value="America/Vancouver">America/Vancouver</option>
                                                    <option value="Canada/Pacific">Canada/Pacific</option>
                                                    <option value="Mexico/BajaNorte">Mexico/BajaNorte</option>
                                                    <option value="America/Guayaquil">America/Guayaquil</option>
                                                    <option value="Europe/Riga">Europe/Riga</option>
                                                    <option value="Asia/Rangoon">Asia/Rangoon</option>
                                                    <option value="Asia/Yangon">Asia/Yangon</option>
                                                    <option value="Europe/Rome">Europe/Rome</option>
                                                    <option value="Europe/San_Marino">Europe/San_Marino</option>
                                                    <option value="Europe/Vatican">Europe/Vatican</option>
                                                    <option value="Africa/Johannesburg">Africa/Johannesburg</option>
                                                    <option value="Africa/Johannesburg">Africa/Johannesburg</option>
                                                    <option value="Africa/Johannesburg">Africa/Johannesburg</option>
                                                    <option value="Africa/Maseru">Africa/Maseru</option>
                                                    <option value="Africa/Mbabane">Africa/Mbabane</option>
                                                    <option value="Africa/Windhoek">Africa/Windhoek</option>
                                                    <option value="Africa/Maseru">Africa/Maseru</option>
                                                    <option value="Africa/Mbabane">Africa/Mbabane</option>
                                                    <option value="Africa/Maseru">Africa/Maseru</option>
                                                    <option value="Africa/Mbabane">Africa/Mbabane</option>
                                                    <option value="Africa/Windhoek">Africa/Windhoek</option>
                                                    <option value="America/Santo_Domingo">America/Santo_Domingo</option>
                                                    <option value="Europe/Stockholm">Europe/Stockholm</option>
                                                    <option value="America/Costa_Rica">America/Costa_Rica</option>
                                                    <option value="Atlantic/Stanley">Atlantic/Stanley</option>
                                                    <option value="America/Punta_Arenas">America/Punta_Arenas</option>
                                                    <option value="America/Santiago">America/Santiago</option>
                                                    <option value="Chile/Continental">Chile/Continental</option>
                                                    <option value="Asia/Kuala_Lumpur">Asia/Kuala_Lumpur</option>
                                                    <option value="Asia/Singapore">Asia/Singapore</option>
                                                    <option value="Europe/Simferopol">Europe/Simferopol</option>
                                                    <option value="Pacific/Samoa">Pacific/Samoa</option>
                                                    <option value="Pacific/Midway">Pacific/Midway</option>
                                                    <option value="Pacific/Pago_Pago">Pacific/Pago_Pago</option>
                                                    <option value="Asia/Tbilisi">Asia/Tbilisi</option>
                                                    <option value="Asia/Tehran">Asia/Tehran</option>
                                                    <option value="Europe/Tallinn">Europe/Tallinn</option>
                                                    <option value="Etc/UCT">Etc/UCT</option>
                                                    <option value="Etc/Universal">Etc/Universal</option>
                                                    <option value="Etc/UTC">Etc/UTC</option>
                                                    <option value="Etc/Zulu">Etc/Zulu</option>
                                                    <option value="UTC" selected>UTC</option>
                                                    <option value="UTC" selected>UTC</option>
                                                    <option value="Africa/Windhoek">Africa/Windhoek</option>
                                                    <option value="Africa/Ndjamena">Africa/Ndjamena</option>
                                                    <option value="Africa/Brazzaville">Africa/Brazzaville</option>
                                                    <option value="Africa/Bangui">Africa/Bangui</option>
                                                    <option value="Africa/Douala">Africa/Douala</option>
                                                    <option value="Africa/Kinshasa">Africa/Kinshasa</option>
                                                    <option value="Africa/Lagos">Africa/Lagos</option>
                                                    <option value="Africa/Libreville">Africa/Libreville</option>
                                                    <option value="Africa/Luanda">Africa/Luanda</option>
                                                    <option value="Africa/Malabo">Africa/Malabo</option>
                                                    <option value="Africa/Ndjamena">Africa/Ndjamena</option>
                                                    <option value="Africa/Niamey">Africa/Niamey</option>
                                                    <option value="Africa/Porto-Novo">Africa/Porto-Novo</option>
                                                    <option value="Africa/Windhoek">Africa/Windhoek</option>
                                                    <option value="Europe/Lisbon">Europe/Lisbon</option>
                                                    <option value="Europe/Madrid">Europe/Madrid</option>
                                                    <option value="Europe/Monaco">Europe/Monaco</option>
                                                    <option value="Europe/Paris">Europe/Paris</option>
                                                    <option value="Europe/Paris">Europe/Paris</option>
                                                    <option value="Europe/Luxembourg">Europe/Luxembourg</option>
                                                    <option value="Africa/Algiers">Africa/Algiers</option>
                                                    <option value="Africa/Casablanca">Africa/Casablanca</option>
                                                    <option value="Africa/Ceuta">Africa/Ceuta</option>
                                                    <option value="Africa/El_Aaiun">Africa/El_Aaiun</option>
                                                    <option value="Atlantic/Canary">Atlantic/Canary</option>
                                                    <option value="Atlantic/Faeroe">Atlantic/Faeroe</option>
                                                    <option value="Atlantic/Faroe">Atlantic/Faroe</option>
                                                    <option value="Atlantic/Madeira">Atlantic/Madeira</option>
                                                    <option value="Europe/Brussels">Europe/Brussels</option>
                                                    <option value="Europe/Lisbon">Europe/Lisbon</option>
                                                    <option value="Europe/Luxembourg">Europe/Luxembourg</option>
                                                    <option value="Europe/Madrid">Europe/Madrid</option>
                                                    <option value="Europe/Monaco">Europe/Monaco</option>
                                                    <option value="Europe/Paris">Europe/Paris</option>
                                                    <option value="Europe/Luxembourg">Europe/Luxembourg</option>
                                                    <option value="Africa/Algiers">Africa/Algiers</option>
                                                    <option value="Africa/Casablanca">Africa/Casablanca</option>
                                                    <option value="Africa/Ceuta">Africa/Ceuta</option>
                                                    <option value="Africa/El_Aaiun">Africa/El_Aaiun</option>
                                                    <option value="Atlantic/Azores">Atlantic/Azores</option>
                                                    <option value="Atlantic/Canary">Atlantic/Canary</option>
                                                    <option value="Atlantic/Faeroe">Atlantic/Faeroe</option>
                                                    <option value="Atlantic/Faroe">Atlantic/Faroe</option>
                                                    <option value="Atlantic/Madeira">Atlantic/Madeira</option>
                                                    <option value="Europe/Andorra">Europe/Andorra</option>
                                                    <option value="Europe/Brussels">Europe/Brussels</option>
                                                    <option value="Europe/Lisbon">Europe/Lisbon</option>
                                                    <option value="Europe/Luxembourg">Europe/Luxembourg</option>
                                                    <option value="Europe/Madrid">Europe/Madrid</option>
                                                    <option value="Europe/Monaco">Europe/Monaco</option>
                                                    <option value="Asia/Jakarta">Asia/Jakarta</option>
                                                    <option value="Asia/Pontianak">Asia/Pontianak</option>
                                                    <option value="Asia/Makassar">Asia/Makassar</option>
                                                    <option value="Asia/Pontianak">Asia/Pontianak</option>
                                                    <option value="Asia/Ujung_Pandang">Asia/Ujung_Pandang</option>
                                                    <option value="Asia/Jayapura">Asia/Jayapura</option>
                                                    <option value="Europe/Vilnius">Europe/Vilnius</option>
                                                    <option value="Europe/Warsaw">Europe/Warsaw</option>
                                                    <option value="America/Dawson">America/Dawson</option>
                                                    <option value="America/Whitehorse">America/Whitehorse</option>
                                                    <option value="Canada/Yukon">Canada/Yukon</option>
                                                    <option value="America/Dawson">America/Dawson</option>
                                                    <option value="America/Juneau">America/Juneau</option>
                                                    <option value="America/Whitehorse">America/Whitehorse</option>
                                                    <option value="America/Yakutat">America/Yakutat</option>
                                                    <option value="Canada/Yukon">Canada/Yukon</option>
                                                    <option value="America/Dawson">America/Dawson</option>
                                                    <option value="America/Whitehorse">America/Whitehorse</option>
                                                    <option value="America/Yakutat">America/Yakutat</option>
                                                    <option value="Canada/Yukon">Canada/Yukon</option>
                                                    <option value="America/Anchorage">America/Anchorage</option>
                                                    <option value="America/Dawson">America/Dawson</option>
                                                    <option value="America/Juneau">America/Juneau</option>
                                                    <option value="America/Nome">America/Nome</option>
                                                    <option value="America/Sitka">America/Sitka</option>
                                                    <option value="America/Whitehorse">America/Whitehorse</option>
                                                    <option value="America/Yakutat">America/Yakutat</option>
                                                    <option value="Canada/Yukon">Canada/Yukon</option>
                                                    <option value="America/Dawson">America/Dawson</option>
                                                    <option value="America/Whitehorse">America/Whitehorse</option>
                                                    <option value="America/Yakutat">America/Yakutat</option>
                                                    <option value="Canada/Yukon">Canada/Yukon</option>
                                                </select>
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
                                    <fieldset>
                                        <legend>Measurement Units</legend>
                                        <div class='form-group'><label class='control-label col-md-2'>Weight<span class='text-danger'> *</span></label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="weight" class="form-control validate[required,custom[onlyLetterNumber]]" id="" value="KG" /></div>
                                            </div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Height<span class='text-danger'> *</span></label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="height" class="form-control validate[required,custom[onlyLetterNumber]]" id="" value="Centimeter" /></div>
                                            </div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Chest<span class='text-danger'> *</span></label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="chest" class="form-control validate[required,custom[onlyLetterNumber]]" id="" value="Inches" /></div>
                                            </div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Waist<span class='text-danger'> *</span></label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="waist" class="form-control validate[required,custom[onlyLetterNumber]]" id="" value="Inches" /></div>
                                            </div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Thing<span class='text-danger'> *</span></label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="thing" class="form-control validate[required,custom[onlyLetterNumber]]" id="" value="Inches" /></div>
                                            </div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Arms<span class='text-danger'> *</span></label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="arms" class="form-control validate[required,custom[onlyLetterNumber]]" id="" value="Inches" /></div>
                                            </div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Fat<span class='text-danger'> *</span></label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="fat" class="form-control validate[required,custom[onlyLetterNumber]]" id="" value="Percentage" /></div>
                                            </div>
                                        </div>
                                    </fieldset><br><br>
                                    <fieldset>
                                        <legend>Member Privacy Setting</legend>
                                        <div class='form-group'><label class='control-label col-md-2'>Member can view other member's details</label>
                                            <div class='col-md-8 checkbox'><label class='radio-inline'><input type="hidden" name="member_can_view_other" value="0" /><input type="checkbox" name="member_can_view_other" value="1"> Enable</label></div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Staff Member can view own trainee member's details</label>
                                            <div class='col-md-8 checkbox'><label class='radio-inline'><input type="hidden" name="staff_can_view_own_member" value="0" /><input type="checkbox" name="staff_can_view_own_member" value="1" checked="checked"> Enable</label></div>
                                        </div>
                                    </fieldset><br><br>
                                    <fieldset>
                                        <legend>Paypal Setting</legend>
                                        <div class='form-group'><label class='control-label col-md-2'>Enable Sandbox</label>
                                            <div class='col-md-8 checkbox'><label class='radio-inline'><input type="hidden" name="enable_sandbox" value="0" /><input type="checkbox" name="enable_sandbox" value="1"> Enable</label></div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Paypal Email Id<span class='text-danger'> *</span></label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="paypal_email" class="form-control validate[required]" id="" value="your_id@paypal.com" /></div>
                                            </div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Select Currency<span class='text-danger'> *</span></label>
                                            <div class='col-md-8'><select class='form-control' name='currency'>
                                                    <option value='ALL'>Albania Lek</option>
                                                    <option value='AFN'>Afghanistan Afghani</option>
                                                    <option value='ARS'>Argentina Peso</option>
                                                    <option value='AWG'>Aruba Guilder</option>
                                                    <option value='AUD'>Australia Dollar</option>
                                                    <option value='AZN'>Azerbaijan New Manat</option>
                                                    <option value='BSD'>Bahamas Dollar</option>
                                                    <option value='BBD'>Barbados Dollar</option>
                                                    <option value='BYR'>Belarus Ruble</option>
                                                    <option value='BZD'>Belize Dollar</option>
                                                    <option value='BMD'>Bermuda Dollar</option>
                                                    <option value='BOB'>Bolivia Boliviano</option>
                                                    <option value='BAM'>Bosnia and Herzegovina Convertible Marka</option>
                                                    <option value='BWP'>Botswana Pula</option>
                                                    <option value='BGN'>Bulgaria Lev</option>
                                                    <option value='BRL'>Brazil Real</option>
                                                    <option value='BND'>Brunei Darussalam Dollar</option>
                                                    <option value='KHR'>Cambodia Riel</option>
                                                    <option value='CAD'>Canada Dollar</option>
                                                    <option value='KYD'>Cayman Islands Dollar</option>
                                                    <option value='CLP'>Chile Peso</option>
                                                    <option value='CNY'>China Yuan Renminbi</option>
                                                    <option value='COP'>Colombia Peso</option>
                                                    <option value='CRC'>Costa Rica Colon</option>
                                                    <option value='HRK'>Croatia Kuna</option>
                                                    <option value='CUP'>Cuba Peso</option>
                                                    <option value='CZK'>Czech Republic Koruna</option>
                                                    <option value='DKK'>Denmark Krone</option>
                                                    <option value='DOP'>Dominican Republic Peso</option>
                                                    <option value='XCD'>East Caribbean Dollar</option>
                                                    <option value='EGP'>Egypt Pound</option>
                                                    <option value='SVC'>El Salvador Colon</option>
                                                    <option value='EEK'>Estonia Kroon</option>
                                                    <option value='EUR'>Euro Member Countries</option>
                                                    <option value='FKP'>Falkland Islands (Malvinas) Pound</option>
                                                    <option value='FJD'>Fiji Dollar</option>
                                                    <option value='GHC'>Ghana Cedis</option>
                                                    <option value='GIP'>Gibraltar Pound</option>
                                                    <option value='GTQ'>Guatemala Quetzal</option>
                                                    <option value='GGP'>Guernsey Pound</option>
                                                    <option value='GYD'>Guyana Dollar</option>
                                                    <option value='HNL'>Honduras Lempira</option>
                                                    <option value='HKD'>Hong Kong Dollar</option>
                                                    <option value='HUF'>Hungary Forint</option>
                                                    <option value='ISK'>Iceland Krona</option>
                                                    <option value='INR'>India Rupee</option>
                                                    <option value='IDR'>Indonesia Rupiah</option>
                                                    <option value='IRR'>Iran Rial</option>
                                                    <option value='IMP'>Isle of Man Pound</option>
                                                    <option value='ILS'>Israel Shekel</option>
                                                    <option value='JMD'>Jamaica Dollar</option>
                                                    <option value='JPY'>Japan Yen</option>
                                                    <option value='JEP'>Jersey Pound</option>
                                                    <option value='KZT'>Kazakhstan Tenge</option>
                                                    <option value='KPW'>Korea (North) Won</option>
                                                    <option value='KRW'>Korea (South) Won</option>
                                                    <option value='KGS'>Kyrgyzstan Som</option>
                                                    <option value='LAK'>Laos Kip</option>
                                                    <option value='LVL'>Latvia Lat</option>
                                                    <option value='LBP'>Lebanon Pound</option>
                                                    <option value='LRD'>Liberia Dollar</option>
                                                    <option value='LTL'>Lithuania Litas</option>
                                                    <option value='MKD'>Macedonia Denar</option>
                                                    <option value='MYR'>Malaysia Ringgit</option>
                                                    <option value='MUR'>Mauritius Rupee</option>
                                                    <option value='MXN'>Mexico Peso</option>
                                                    <option value='MNT'>Mongolia Tughrik</option>
                                                    <option value='MZN'>Mozambique Metical</option>
                                                    <option value='NAD'>Namibia Dollar</option>
                                                    <option value='NPR'>Nepal Rupee</option>
                                                    <option value='ANG'>Netherlands Antilles Guilder</option>
                                                    <option value='NZD'>New Zealand Dollar</option>
                                                    <option value='NIO'>Nicaragua Cordoba</option>
                                                    <option value='NGN'>Nigeria Naira</option>
                                                    <option value='KPW'>Korea (North) Won</option>
                                                    <option value='NOK'>Norway Krone</option>
                                                    <option value='OMR'>Oman Rial</option>
                                                    <option value='PKR'>Pakistan Rupee</option>
                                                    <option value='PAB'>Panama Balboa</option>
                                                    <option value='PYG'>Paraguay Guarani</option>
                                                    <option value='PEN'>Peru Nuevo Sol</option>
                                                    <option value='PHP'>Philippines Peso</option>
                                                    <option value='PLN'>Poland Zloty</option>
                                                    <option value='QAR'>Qatar Riyal</option>
                                                    <option value='RON'>Romania New Leu</option>
                                                    <option value='RUB'>Russia Ruble</option>
                                                    <option value='SHP'>Saint Helena Pound</option>
                                                    <option value='SAR'>Saudi Arabia Riyal</option>
                                                    <option value='RSD'>Serbia Dinar</option>
                                                    <option value='SCR'>Seychelles Rupee</option>
                                                    <option value='SGD'>Singapore Dollar</option>
                                                    <option value='SBD'>Solomon Islands Dollar</option>
                                                    <option value='SOS'>Somalia Shilling</option>
                                                    <option value='ZAR'>South Africa Rand</option>
                                                    <option value='KRW'>Korea (South) Won</option>
                                                    <option value='LKR'>Sri Lanka Rupee</option>
                                                    <option value='SEK'>Sweden Krona</option>
                                                    <option value='CHF'>Switzerland Franc</option>
                                                    <option value='SRD'>Suriname Dollar</option>
                                                    <option value='SYP'>Syria Pound</option>
                                                    <option value='TWD'>Taiwan New Dollar</option>
                                                    <option value='THB'>Thailand Baht</option>
                                                    <option value='TTD'>Trinidad and Tobago Dollar</option>
                                                    <option value='TRY'>Turkey Lira</option>
                                                    <option value='TRL'>Turkey Lira</option>
                                                    <option value='TVD'>Tuvalu Dollar</option>
                                                    <option value='UAH'>Ukraine Hryvna</option>
                                                    <option value='GBP'>United Kingdom Pound</option>
                                                    <option value='USD' selected>United States Dollar</option>
                                                    <option value='UYU'>Uruguay Peso</option>
                                                    <option value='UZS'>Uzbekistan Som</option>
                                                    <option value='VEF'>Venezuela Bolivar</option>
                                                    <option value='VND'>Viet Nam Dong</option>
                                                    <option value='YER'>Yemen Rial</option>
                                                    <option value='ZWD'>Zimbabwe Dollar</option>
                                                </select></div>
                                        </div>
                                    </fieldset><br><br>
                                    <fieldset>
                                        <legend>Membership Alert Message Setting</legend>
                                        <div class='form-group'><label class='control-label col-md-2'>Enable Alert Mail</label>
                                            <div class='col-md-8 checkbox'><label class='radio-inline'><input type="hidden" name="enable_alert" value="0" /><input type="checkbox" name="enable_alert" value="1" checked="checked"> Enable</label></div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Reminder Before Days</label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="reminder_days" class="form-control" id="" value="5" /></div>
                                            </div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Reminder Message</label>
                                            <div class='col-md-8'><textarea name="reminder_message" class="form-control" rows="5">Hello GYM_MEMBERNAME,
      Your Membership  GYM_MEMBERSHIP  started at GYM_STARTDATE and it will expire on GYM_ENDDATE.
Thank You.</textarea></div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>ShortCodes For Notification Mail Message</label>
                                            <div class='save_check col-md-8 checkbox'>
                                                <label class='radio-inline'>
                                                    <p>Member Name -> GYM_MEMBERNAME<p>
                                                            <p>Membership Name -> GYM_MEMBERSHIP <p>
                                                                    <p>Membership Start Date -> GYM_STARTDATE <p>
                                                                            <p>Membership End Date -> GYM_ENDDATE<p>
                                                </label></div>
                                        </div>
                                    </fieldset><br><br>
                                    <fieldset>
                                        <legend>Message Setting</legend>
                                        <div class='form-group'><label class='control-label col-md-2'>Member can Message To other's</label>
                                            <div class='col-md-8 checkbox'><label class='radio-inline'><input type="hidden" name="enable_message" value="0" /><input type="checkbox" name="enable_message" value="1" checked="checked"> Enable</label></div>
                                        </div>
                                    </fieldset><br><br>
                                    <fieldset>
                                        <legend>Header & Footer Text</legend>
                                        <div class='form-group'><label class='control-label col-md-2'>Left Header Text</label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="left_header" class="form-control" id="" value="GYM MASTER" /></div>
                                            </div>
                                        </div>
                                        <div class='form-group'><label class='control-label col-md-2'>Footer Text</label>
                                            <div class='col-md-8'>
                                                <div class="input text"><input type="text" name="footer" class="form-control" id="" value="Copyright © 2016-2017. All rights reserved." /></div>
                                            </div>
                                        </div>
                                    </fieldset><br><br><button class="btn btn-flat btn-success" name="save_setting" type="submit">Save Settings</button>
                                </form>
                            </div>
                            <div class="overlay gym-overlay">
                                <i class="fa fa-refresh fa-spin"></i>
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