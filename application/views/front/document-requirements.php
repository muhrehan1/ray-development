<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
.accordion-body p:first-letter {
    text-transform: capitalize;
}
img.passport {
    padding-bottom: 15px;
    width: 18% !important;
}
div#collapseeight a.btn_all {
    margin-bottom: 20px;
}
div#collapsefive a.btn_all {
    margin-bottom: 20px;
}
a.btn_all {
    background: #a18246;
    color: #fff;
    text-transform: capitalize;
    text-decoration: none;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 33%;
    font-family: 'Proxima Nova';
    border-radius: 4px;
}
.accordion-body h4 {
    padding-bottom: 10px;
    font-size: 32px;
}
.accordion-body h5 {
    padding-bottom: 10px;
    text-transform: uppercase;
    font-weight: 300;
    font-family: 'Inter';
    font-size: 22px;
}
.accordion-body h6 {
    text-align: left;
    padding-bottom: 20px;
}
.accordion-body {
    padding: 30px 25px 40px;
}
.divider i {
    color: #bbb !important;
    background: #fff;
    display: inline-block;
    height: 50px;
    line-height: 50px;
    text-align: center;
    width: 50px;
    font-size: 20px;
    position: absolute;
    top: -25px;
    left: 50%;
    margin: 0 auto 0 -25px;
}
.divider {
    border: 0;
    margin: 60px 0;
    height: 4px;
    border-top: #ddd 1px solid;
    border-bottom: #ddd 1px solid;
    text-align: center;
    position: relative;
    clear: both;
}
.divider.half-margins {
    margin: 30px 0;
}
.accordion-body  ul li {
    font-size: 15px;
    font-family: 'Inter';
    line-height: 1.6;
    font-weight: 400;
}
.accordion-body img {
    width: 100%;
}
.accordion-body p a {
    color: #a38242;
}
.accordion-body p {
    font-size: 15px;
    font-family: 'Inter';
    line-height: 1.6;
    font-weight: 400;
}
    button.accordion-button img {
    width: 37px;
    padding-right: 14px;
}
div#accordionExample button.accordion-button {
    background: #fff;
    border: 1px solid #a38242;
    color: #a38242;
    box-shadow: none !important;
}
div#accordionExample .accordion-item {
    border: 0;
    box-shadow: 0 0 11px 6px #cccccc61;
}
div#accordionExample button.accordion-button::after {
    filter: invert(1);
}
div#accordionExample .accordion-collapse {
    border: 1px solid #a18246;
    border-top: 0;
}
div#accordionExample .accordion-item:not(:last-child) {
    margin-bottom: 25px;
}
</style>

<section class="inner-banner">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                        <h2>Document Requirements</h2>
                        <ul>
                            <li><a href="JavaScript:;">Home</a></li>
                            <li><a href="JavaScript:;" class="active">Document Requirements</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                        <h6>GET DOCUMENTS</h6>
                        <h2>Document Requirements</h2>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingOne">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    New U.S. Passport Eligibility
                                  </button>
                                </h3>
                                <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <p>You have never had a U.S. passport. <br/>
                                        Your current passport was issued more than 15 years ago.<br/>
                                        Your most recent U.S. passport was issued prior to your 16th birthday.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingtwo">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                                    <img src="<?php echo base_url('/assets/front/images/proof-of-citizenship.svg');?>">proof of citizenship
                                  </button>
                                </h3>
                                <div id="collapsetwo" class="accordion-collapse collapse" aria-labelledby="headingtwo" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                      <div class="row">
                                          <div class="col-md-2 col-sm-12">
                                              <img src="<?php echo base_url('/assets/front/images/proof-of-citizenship.svg');?>">
                                          </div>
                                          <div class="col-md-10 col-sm-12">
                                              <p>normally an applicant would submit a certified copy of a state city or country issued birth certificate.  (please see requirements placed by the us state dept on this record click here. if you are not in possession of this type of birth certificate click below for a link of where to go to get one <a href="javscript:void(0);">click here.</a></p>
                                                <p>if you are applying for a new passport and you have had a previous passport (regardless of when it was issued) you can submit this passport as evidence of citizenship unless you no longer have it in your possession.  if you are applying as, or in behalf of a minor, you must submit both the previously issued passport and a certified original of the birth certifice showing both parents’ names on the record.  for acceptable alternatives to proof of citizenship <a>click here.</a></p>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                          </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingthree">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsethre" aria-expanded="true" aria-controls="collapsethre">
                                    <img src="<?php echo base_url('/assets/front/images/proof-of-identity.svg');?>">proof of identification
                                  </button>
                                </h3>
                                <div id="collapsethre" class="accordion-collapse collapse" aria-labelledby="headingthree" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                      <div class="row">
                                          <div class="col-md-2 col-sm-12">
                                              <img src="<?php echo base_url('/assets/front/images/proof-of-identity.svg');?>">
                                          </div>
                                          <div class="col-md-10 col-sm-12">
                                              <p>for a list of acceptable forms of idetification required to appy for a us passport <a href="javascript:void(0);">click here.</a></p>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                          </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingfour">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                                    <img src="<?php echo base_url('/assets/front/images/photo.svg');?>">one recent passport photo
                                  </button>
                                </h3>
                                <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                      <div class="row">
                                          <div class="col-md-2 col-sm-12">
                                              <img src="<?php echo base_url('/assets/front/images/photo.svg');?>">
                                          </div>
                                          <div class="col-md-10 col-sm-12">
                                              <p><a href="javascipt:void(0);">click here</a> to read the state dept’s description of an acceptable us passport photo.</p>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                          </div>
                            <div class="accordion-item">
                                    <h3 class="accordion-header" id="headingfive">
                                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
                                        <img src="<?php echo base_url('/assets/front/images/special-letter.svg');?>">Letter of Authorization
                                      </button>
                                    </h3>
                                    <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#accordionExample">
                                          <div class="accordion-body">
                                              <div class="row">
                                                  <div class="col-md-2 col-sm-12">
                                                      <img src="<?php echo base_url('/assets/front/images/special-letter.svg');?>">
                                                  </div>
                                                  <div class="col-md-10 col-sm-12">
                                                    <!--<a class="btn_all" href="javascript:void(0);">Click here to print the Authorization Letter</a>-->
                                                    <p><strong>LOA  Statement:</strong> The Letter of Authorization (to be provided by RJR Passports once you have placed your order with us).  It is required by the State Dept and gives RJR Passports permission to act on your behalf at the Passport Agency, submitting this document authorizes us to pick up your passport and to negotiate any suspensions or logistics.</p>
                                                    <p>Here is our current PS and has a Download Button which needs to be removed and the statement above must replace the language current there:</p>
                                                  </div>
                                              </div>
                                          </div>
                                    </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="six">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="true" aria-controls="collapsesix">
                                    <img src="<?php echo base_url('/assets/front/images/travel-plans.svg');?>">Proof of Departure
                                  </button>
                                </h3>
                                <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="six" data-bs-parent="#accordionExample">
                                      <div class="accordion-body">
                                          <div class="row">
                                              <div class="col-md-2 col-sm-12">
                                                  <img src="<?php echo base_url('/assets/front/images/travel-plans.svg');?>">
                                              </div>
                                              <div class="col-md-10 col-sm-12">
                                                <p>confirmed international flight from acceptable travel reservation systems i.e. travel agent or online site, must show revervation and name of traveler(s) and destination.</p>
                                                
                                              </div>
                                          </div>
                                      </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="seven">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseseven" aria-expanded="true" aria-controls="collapseseven">
                                    <img src="<?php echo base_url('/assets/front/images/Children or Minors.svg');?>">Proof of Identity
                                  </button>
                                </h3>
                                <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="seven" data-bs-parent="#accordionExample">
                                      <div class="accordion-body">
                                          <div class="row">
                                              <div class="col-md-2 col-sm-12">
                                                  <img src="<?php echo base_url('/assets/front/images/Children or Minors.svg');?>">
                                              </div>
                                              <div class="col-md-10 col-sm-12">
                                                <p>ADDITIONAL REQUIREMENTS FOR CHILDREN UNDER 16 YEARS</p>
                                                <ul>
                                                    <li>1. Both parents or child's legal guardian must:
                                                        <ul>
                                                            <p>Present evidence of child's U.S. citizenship (One of the following):</p>
                                                            <li>1. Previously issued, undamaged US Passport.</li>
                                                            <li>2. Certified Birth Certificate issued by the city, county or state.</li>
                                                            <li>3. Consular Report of Birth Abroad or Certification of Birth.</li>
                                                            <li>4. Naturalization Certificate.</li>
                                                            <li>5. Certificate of Citizenship.</li>
                                                        </ul>
                                                        <ul>
                                                            <p>and:<br/>
                                                            Present evidence they are the child's parents or guardian (One of the following):</p>
                                                            <li>1. Minors certified US Birth Certificate with BOTH parents' names.</li>
                                                            <li>2. Minors certified Foreign Birth Certificate with BOTH parents' names.</li>
                                                            <li>3. Minors Report of Birth Abroad with BOTH parents' names</li>
                                                            <li>4. Adoption Decree with adopting parents' names.</li>
                                                            <li>5. Court Order establishing custody.</li>
                                                            <li>6. Court Order establishing guardianship.</li>
                                                            <p>and:<br/>
                                                            Show valid personal identification, and<br/>
                                                            Sign and take oath before an authorized passport acceptance agent.</p>
                                                        </ul>
                                                    </li>
                                                    <li>2. If the second parent is not available, the appearing parent must Do as above, and print and complete the following form:</li>
                                                    <p><a href="javscript:void(0);">DS-3053: Statement of Consent - Issuance of a Passport to a Minor Under Age 16</a></p>
                                                    <p>This form should be submitted, along with the DS-11 Application for Passport, for minors under age 16 as evidence of parental permission for the following reasons.<br/>
You are a non-applying parent or guardian consenting to passport issuance for your child, or<br/>
You are an applying parent or guardian, and the written consent of the non-applying parent or guardian cannot be obtained</p>
                                                    <li>3. If no parent is available to sign, the third party in lieu parent must:</li>
                                                    <p>Appear with a notarized written statement or affidavit from both parents or custodial parent(s) authoring the third party to apply for the passport. When the statement or affidavit is from only one parent, the third party must present evidence of sole custody of the authorizing parent.</p>
                                                    <p>The law requires that all applications be signed under oath under the penalty of perjury.<br/>
THESE INSTRUCTIONS ARE ADDITIONAL REQUIREMENTS FOR CHILDREN UNDER 16 YEARS<br/>
<br/>
All minor children applying for passports are required to appear in person at the local acceptance agency.</p>
                                                </ul>
                                              </div>
                                          </div>
                                      </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="eight">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseeight" aria-expanded="true" aria-controls="collapseeight">
                                    <img src="<?php echo base_url('/assets/front/images/electronic-application.svg');?>">DS-11 Form
                                  </button>
                                </h3>
                                <div id="collapseeight" class="accordion-collapse collapse" aria-labelledby="eight" data-bs-parent="#accordionExample">
                                      <div class="accordion-body">
                                          <div class="row">
                                              <div class="col-md-2 col-sm-12">
                                                  <img src="<?php echo base_url('/assets/front/images/electronic-application.svg');?>">
                                              </div>
                                              <div class="col-md-10 col-sm-12">
                                                <a class="btn_all" target="_blank" href="https://pptform.state.gov/">DS-11: Application for New Passport.</a>
                                                <p><strong>Note:</strong> click on the ds-11 form to complete the us state department’s passport form.  you must complete the “fillable” format</p>
                                                
                                                <p>*on the last page of the questionaire, choose to have your application expedited at an “agency” and additionally, choose the shipping of $19.53. you will not be paying anything during the completion of this form, the purpose in using the fillable form is to ensure all answers are being encrypted into a 2-d bar code which will appear on top left corner of the first page of the form once it has been created as a printable pdf.</p>
                                              </div>
                                          </div>
                                      </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="nine">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsenine" aria-expanded="true" aria-controls="collapsenine">
                                    <img src="<?php echo base_url('/assets/front/images/passport.svg');?>">Passport Card
                                  </button>
                                </h3>
                                <div id="collapsenine" class="accordion-collapse collapse" aria-labelledby="nine" data-bs-parent="#accordionExample">
                                      <div class="accordion-body">
                                          <div class="row">
                                              <div class="col-md-2 col-sm-12">
                                                  <img src="<?php echo base_url('/assets/front/images/passport.svg');?>">
                                              </div>
                                              <div class="col-md-10 col-sm-12">
                                                <p>If you are applying for a regular U.S. passport book only, please mark the box on your passport application next to "Passport Book". If you also want to apply for a U.S. Passport Card you should also mark the box next "Passport Card". There is an additional $55.00 (Adults) $40.00 (Minors) U.S. government fee for the Passport Card.</p>
                                                <img class="passport" src="<?php echo base_url('/assets/front/images/passport_card.png');?>">
                                                <p>The U.S. Passport Card increases speed and efficiency to meet the new travel requirements for land and sea border crossings of nearby countries.</p>
                                                <p>An extra form of official government ID which will conveniently fit in your wallet.<br/>
     Use your Passport Card to travel by land or sea to Canada, Mexico, Bahamas<br/>
  and the Caribbean without your bulky Passport Book.<br/>
   The passport card is valid for 10 years.</p>
                                                <h5>government filing fees</h5>
                                                <p>please <a href="javascript:void(0);">click link</a> to fees table.</p>
                                                <p>Important notes about the Fees:</p>
                                                <ul>
                                                    <li>1.	This fee is not included in the fees paid to RJR for our services but rather paid directly to the US State Department and represents the government related fees.</li>
                                                    <li>2.	No Starter Checks (checks given by the bank when you first open an account.  This type of check does not have your name and address on it.</li>
                                                    <li>3.	You must add the Shipping fees to the government fees as indicated on the government link to fees tables.</li>
                                                    <li>4.	Checks or money orders are made payable to the SU State Department and must be dated correctly and posted the date of the application.</li>
                                                    <li>5.	Checks must bear full address and telephone number of the applicant or a related entity like a business account.</li>
                                                </ul>
                                                <h5>envelope</h5>
                                                <p>Take with you a 9x12 envelope to have the Post Office seal your application and contents after witnessing your signature.  All documents are enclosed along with payment to US State Department.</p>
                                              </div>
                                          </div>
                                      </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="ten">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseten" aria-expanded="true" aria-controls="collapseten">
                                    <img src="<?php echo base_url('/assets/front/images/Extended Stay.svg');?>">OMG! I Gotta Go - By Appointment Only
                                  </button>
                                </h3>
                                <div id="collapseten" class="accordion-collapse collapse" aria-labelledby="ten" data-bs-parent="#accordionExample">
                                      <div class="accordion-body">
                                          <div class="row">
                                              <div class="col-md-2 col-sm-12">
                                                  <img src="<?php echo base_url('/assets/front/images/Extended Stay.svg');?>">
                                              </div>
                                              <div class="col-md-10 col-sm-12">
                                                <p>Same Day Processing "OMG! I Gotta Go" is by appoinment only.<br/>
Please call Traveldocs to check the availability of this option, so we can schedule an appointment with the U.S. Passport Agency on your behalf. (A personal appearance at the U.S. Passport Agency or Traveldocs is not required).. Call Now 866-797-2600</p>
                                              </div>
                                          </div>
                                      </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </section>
  