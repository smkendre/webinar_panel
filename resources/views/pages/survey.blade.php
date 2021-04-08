@extends('auth.app')

@section('content')

<div class="suravyformbg">
    <div class="suravyform2main">
        <form id="agilent_survey" name="agilent_survey" method="POST" action="">
            @csrf
            <div class="suravyform2wrap1">
                <div class="suravyform2wrap1box1">
                    <label>Name:</label> <input type="text" id="name" name="name" disabled
                        value="{{ session()->get('username') }}">
                    <input type="hidden" name="name" value="{{ session()->get('username') }}">
                </div>
                <div class="suravyform2wrap1box1">
                    <label>Registered Email Id:</label> <input type="text" id="email" name="email" disabled
                        value="{{ session()->get('useremail') }}">
                    <input type="hidden" name="email" value="{{ session()->get('useremail') }}">
                </div>
                <div class="suravyform2wrap1box1">
                    <label>Company Name:</label> <input type="text" id="cname" name="cname" disabled
                        value="{{ session()->get('company') }}">
                    <input type="hidden" name="cname" value="{{ session()->get('company') }}">
                </div>
            </div>

            <div class="suravyform2wrap1">
                <div class="suravyform2wrap1box2">
                    <label>(1) Did the webinar meet your objective?</label>
                    <label id="objectives" class="error" for="objectives"></label>
                    <div id="div-noplan" class="survaytextformnormal">
                        <label class="radiobtn1">Yes
                            <input type="radio" name="objectives" value="Yes">
                            <span class="radiocheckmark1"></span>
                        </label>
                        <label class="radiobtn1">No
                            <input type="radio" name="objectives" value="No">
                            <span class="radiocheckmark1"></span>
                        </label>
                    </div>
                    <label id="reasonerror" tabindex="1"></label>
                </div>

            </div>

            <div class="suravyform2wrap1">
                <div class="suravyform2wrap1box2">
                    <label>(2) Which session was most useful for you?</label>
                    <label id="session_useful" class="error" for="session_useful"></label>
                    <div class="survaytextformnormal">
                        <label class="checkbox1">Deciphering mechanisms of immunometabolism in Eukaryotes and Drug
                            Resistance in Bacteria using Extracellular Flux Analysis and 13C Stable-Isotope Tracing
                            <input type="checkbox" class="session_useful" name="session_useful[]"
                                value="Deciphering mechanisms of immunometabolism in Eukaryotes and Drug Resistance in Bacteria using Extracellular Flux Analysis and 13C Stable-Isotope Tracing">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="checkbox1">Analysis of high throughput genomic data for meaningful outcome
                            <input type="checkbox" class="cl_expectations" name="session_useful[]"
                                value="Analysis of high throughput genomic data for meaningful outcome">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="checkbox1">Discovery of novel signaling mechanism driving tumor metabolism in
                            pediatric ocular cancer using multi-omics workflow solution.
                            <input type="checkbox" class="cl_expectations" name="session_useful[]"
                                value="Discovery of novel signaling mechanism driving tumor metabolism in pediatric ocular cancer using multi-omics workflow solution.">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="checkbox1">Plugging the gaps in omics research
                            <input type="checkbox" class="cl_expectations" name="session_useful[]"
                                value="Plugging the gaps in omics research">
                            <span class="checkboxmark1"></span>
                        </label>
                    </div>
                    <label id="reasonerror" tabindex="1"></label>
                </div>

            </div>

            <div class="suravyform2wrap1">
                <div class="suravyform2wrap1box2">
                    <label>(3) What is your area of research?</label>
                    <label id="area_research" class="error" for="area_research"></label>
                    <div class="survaytextformnormal">
                        <label class="checkbox1">Biopharma
                            <input type="checkbox" id='area_research' name="area_research[]" value="Biopharma">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="checkbox1">Forensic
                            <input type="checkbox" id='area_research' name="area_research[]" value="Forensic">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="checkbox1">Clinical Research
                            <input type="checkbox" id='area_research' name="area_research[]" value="Clinical Research">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="checkbox1">Cancer research
                            <input type="checkbox" id="area_research" name="area_research[]" value="Cancer research">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="checkbox1">Infectious Disease
                            <input type="checkbox" id="area_research" name="area_research[]" value="Infectious Disease">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="checkbox1">Multi-Omics
                            <input type="checkbox" id="area_research" name="area_research[]" value="Multi-Omics">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="checkbox1">Vaccine reasearch
                            <input type="checkbox" id="area_research" name="area_research[]" value="Vaccine reasearch">
                            <span class="checkboxmark1"></span>
                        </label>
                    </div>
                    <label id="providererror" tabindex="1"></label>
                </div>

            </div>

            <div class="suravyform2wrap1">
                <div class="suravyform2wrap1box2">
                    <label>(4) Which omics technologies you frequently use ?</label>
                    <input type="text" id="technologies" name="technologies">
                </div>
            </div>

            <div class="suravyform2wrap1">
                <div class="suravyform2wrap1box2">
                    <label>(5) Please specify instruments you currently use for your research.</label>
                    <input type="text" id="instruments" name="instruments">
                </div>
            </div>

            <div class="suravyform2wrap1">
                <div class="suravyform2wrap1box2">
                    <label>(6) Do you need help in developing any of your applications? If yes, please specify</label>
                    <label id="" class="error" for="rd_developing"></label>
                    <div id="div-noplan" class="survaytextformnormal">
                        <label class="radiobtn1">Yes
                            <input type="radio" name="rd_developing" value="Yes">
                            <span class="radiocheckmark1"></span>
                        </label>
                        <label class="radiobtn1">No
                            <input type="radio" name="rd_developing" value="No">
                            <span class="radiocheckmark1"></span>
                        </label>
                        <label class="othercheckinput">
                            <input type="text" id="rd_developing_others" placeholder="Please Specify"
                                name="rd_developing_others">
                        </label>
                    </div>
                    <label id="reasonerror" tabindex="1"></label>
                </div>

            </div>


            <div class="suravyform2wrap1">
                <div class="suravyform2wrap1box2">
                    <label>(7) Please specify instruments that you would be interested to purchase:</label>
                    <label id="chk_interested-error" class="error" for="chk_interested"></label>
                    <div class="survaytextformnormal">
                        <label class="checkbox1">GC/ GCMS
                            <input type="checkbox" class="cl_expectations" name="chk_interested[]" value="GC/ GCMS">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="checkbox1">LC/LCMS
                            <input type="checkbox" class="cl_expectations" name="chk_interested[]" value=" LC/LCMS">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="checkbox1">Seahorse XF Analyzer
                            <input type="checkbox" class="cl_expectations" name="chk_interested[]"
                                value="Seahorse XF Analyzer">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="checkbox1">NGS
                            <input type="checkbox" class="cl_expectations" name="chk_interested[]" value="NGS">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="checkbox1">Microarray
                            <input type="checkbox" class="cl_expectations" name="chk_interested[]" value="Microarray">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="checkbox1">Other
                            <input type="checkbox" class="cl_expectations" name="chk_interested[]" value="Other">
                            <span class="checkboxmark1"></span>
                        </label>
                        <label class="othercheckinput">
                            <input type="text" id="chk_interested_others" placeholder="Please Specify"
                                name="chk_interested_others">
                        </label>
                    </div>
                    <label id="reasonerror" tabindex="1"></label>
                </div>

            </div>


            <div class="suravyform2wrap1">
                <div class="suravyform2wrap1box2">
                    <label>(8) Buying time frame:</label>
                    <label id="rd_timeframe-error" class="error" for="rd_timeframe"></label>
                    <div class="survaytextformnormal">
                        <label class="radiobtn1">In 3-6 months
                            <input type="radio" name="rd_timeframe" value="In 3-6 months">
                            <span class="radiocheckmark1"></span>
                        </label>
                        <label class="radiobtn1">In 6-12 months
                            <input type="radio" name="rd_timeframe" value="In 6-12 months">
                            <span class="radiocheckmark1"></span>
                        </label>
                        <label class="radiobtn1">In 12-18 months
                            <input type="radio" name="rd_timeframe" value="In 12-18 months">
                            <span class="radiocheckmark1"></span>
                        </label>
                    </div>
                </div>

            </div>


            <div class="suravyform2wrap1">
                <div class="suravyform2wrap1box2">
                    <label>(9) Would you like to know more about any particular Agilent instrument/software? If yes,
                        please specify</label>
                    <label id="" class="error" for="rd_software"></label>
                    <div id="div-noplan" class="survaytextformnormal">
                        <label class="radiobtn1">Yes
                            <input type="radio" name="rd_software" value="Yes">
                            <span class="radiocheckmark1"></span>
                        </label>
                        <label class="radiobtn1">No
                            <input type="radio" name="rd_software" value="No">
                            <span class="radiocheckmark1"></span>
                        </label>
                        <label class="othercheckinput">
                            <input type="text" id="rd_software_others" placeholder="Please Specify"
                                name="rd_software_others">
                        </label>
                    </div>
                    <label id="reasonerror" tabindex="1"></label>
                </div>

            </div>

            <div class="suravyform2wrap1">
                <div class="suravyform2wrap1box2">
                    <input type="checkbox" name="marketing" id="marketing" value="Yes">Yes, This is co-hosted by Express
                    Healthcare and Agilent Technologies.
                    <p>By submitting this form, you are confirming you are an adult 18 years or older and agree to
                        Express Healthcare contacting you with marketing-related emails or by telephone. You may
                        unsubscribe from receiving such communications from Express Healthcare at any time. Express
                        Healthcare web sites and communications are subject to our Privacy Notice and Terms of Use.</p>
                    <p>Additionally by submitting this form you also agree that Agilent Technologies would keep you
                        updated on products, services, solutions, exclusive offers, and special events. See Agilent
                        Technologies <a href="https://www.agilent.com/home/privacy-policy"
                            target="_blank"><strong>(Privacy Policy)</strong></a> to know how Agilent Technologies
                        processes your personal information in accordance with the Agilent Privacy Statement. You can
                        unsubscribe at any time.</p>
                    <span id="errorToShow"></span>
                </div>
                <label id="providererror" tabindex="1"></label>
            </div>

            <button type="submit" id="submit" name="submit">Submit</button>


        </form>

    </div>
</div>
@endsection