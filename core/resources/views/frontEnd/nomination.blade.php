

@extends('frontEnd.layouts.profx')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="hero-section">
    <div class="trophies-container">
       
            <div class="award-text">            <h1>Nominate Your Business For PROFX Awards {{ Helper::awardYear() }}</h1>
 <p class="hero-subtitle">Showcase your excellence. Get global recognition.</p>
            <p class="hero-description">
                PROFX Awards {{ Helper::awardYear() }} celebrates innovation, excellence, and leadership across forex, fintech, trading technology, education, media, and industry influence. Complete the form below to submit your nomination for the upcoming Dubai ceremony.
            </p>
        </div>
        </div>
    </div>
  
</div>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK'
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session('error') }}',
        confirmButtonText: 'OK'
    });
</script>
@endif
<section class="form-section mt-5">
        <h2>Nomination Form</h2>

        <form id="nominationForm" action="{{ route('nominations.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6 form-group">

                    <label>Business / Company Name</label>
                    <input type="text" name="company" class="form-control" required>


                </div>

                <div class="col-md-6 form-group">
                    <label>Contact Person</label>
                    <input type="text" name="contact" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label>Job Title / Role</label>
                    <input type="text" name="jobtitle" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label>Confirm Email Address</label>
                    <input type="email" name="confirm_email" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">

               
                <div class="col-md-6 form-group">
                    <label>Select Award Category</label>
                    <select id="category" name="category" class="form-control" required>
                        <option value="">-- Select Category --</option>
                        <option value="ForexBrokerageExcellenceAwards">Forex & Brokerage Excellence Awards</option>
                        <option value="PropFirmAwards">Prop Firm Awards</option>
                        <option value="TechnologyCRMInfrastructure">Technology, CRM & Infrastructure</option>
                        <option value="FintechPaymentAwards">Fintech & Payment Awards</option>
                        <option value="MarketingMediaAwards">Marketing & Media Awards</option>
                        <option value="SpecialExcellenceAwards">Special Excellence Awards</option>
                        <option value="EducationCommunityLeadership">Education, Community & Leadership</option>
                        <option value="InfluencerExcellenceAwards">Influencer Excellence Awards</option>
                    </select>
                </div>

                <div class="col-md-6 form-group" style="margin-top: 15px;">
                    <label>Select Subcategory</label>
                    <select id="subcategory" name="subcategory" class="form-control" required>
                        <option value="">-- Select Subcategory --</option>
                    </select>
                </div>
                 <div class="col-md-6 form-group">
                    <label>Country / Region</label>
                    <input type="text" name="country" class="form-control" required>
                </div>

            </div>
            <div class="row mb-3">
                <div class=" form-group col-md-6">
                    <label>Supporting Statement - Why You Deserve to Win</label>
                    <textarea name="statement" class="form-control" placeholder="Max 500 words"></textarea>
                </div>
                <div class=" form-group col-md-6">
                    <label>Short Description / Tagline of Business</label>
                    <textarea name="description" class="form-control" placeholder="Max 50-100 words"></textarea>
                </div>

            </div>

            <div class="row mb-3">
                <div class="form-group">
                    <label>Consent / Agreement to Terms</label>
                    <label><input type="checkbox" name="consent1" required> I confirm that the information provided is
                        accurate.</label>
                </div>

                <div class="form-group">
                    <label>Privacy / Data Consent</label>
                    <label><input type="checkbox" name="consent2" required> I consent to ProfX storing and processing my submitted
                        information.</label>
                </div>
            </div>
            <button type="submit"
                style=" text-align: center; background-color:#d4af37; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                Submit
            </button>
        </form>
    </section>

  <!-- Benefits Section -->
    <section class="benefits-section">
        <div class="benefits-header">
            <h2>Why Nominate with PROFX Awards</h2>
            <p class="benefits-description">
                Put your brand in front of financial, trading, fintech, and media decision-makers while building credibility for the year ahead.
            </p>
        </div>

       <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">
                    <img class="img-fluid" style="max-width: 50px;" src="{{ asset('assets/keditor/profx/assets/Nomination/globalreach.svg') }}" alt="Global Reach">
                </div>
                <h3 class="benefit-title">Global Reach</h3>
                <p class="benefit-description">Build visibility with a regional and international audience across the financial industry.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <img class="img-fluid" style="max-width: 50px;" src="{{ asset('assets/keditor/profx/assets/Nomination/mediaexposure.svg') }}" alt="Global Reach">
                </div>
                <h3 class="benefit-title">Media Exposure</h3>
                <p class="benefit-description">Nominees, finalists, and winners receive opportunities for coverage across partner media networks.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <img class="img-fluid" style="max-width: 50px;" src="{{ asset('assets/keditor/profx/assets/Nomination/network.svg') }}" alt="Global Reach">
                </div>
                <h3 class="benefit-title">Networking Opportunities</h3>
                <p class="benefit-description">Connect with industry leaders, potential clients, partners, and investors</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <img class="img-fluid" style="max-width: 50px;" src="{{ asset('assets/keditor/profx/assets/Nomination/benchmark.svg') }}" alt="Global Reach">
                </div>
                <h3 class="benefit-title">Benchmark Against the Best</h3>
                <p class="benefit-description">Showcase your strengths and compare your achievements with leading brands in your category.</p>
            </div>

            <div class="benefit-card">
               <div class="benefit-icon">
                    <img class="img-fluid" style="max-width: 50px;" src="{{ asset('assets/keditor/profx/assets/Nomination/marketing.svg') }}" alt="Global Reach">
                </div>
                <h3 class="benefit-title">Marketing Credibility</h3>
                <p class="benefit-description">Winners and finalists can use the official logo and certificate that can be added to marketing, social media, and team collateral</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <img class="img-fluid" style="max-width: 50px;" src="{{ asset('assets/keditor/profx/assets/Nomination/longterm.svg') }}" alt="Global Reach">
                </div>
                <h3 class="benefit-title">Long-Term Prestige</h3>
                <p class="benefit-description">Use finalist or winner recognition as a trust signal across campaigns, proposals, and brand communications.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <img class="img-fluid" style="max-width: 50px;" src="{{ asset('assets/keditor/profx/assets/Nomination/dedicatedsupport.svg') }}" alt="Global Reach">
                </div>
                <h3 class="benefit-title">Dedicated Support</h3>
                <p class="benefit-description">Receive clear updates and support from the PROFX team throughout the nomination process.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <img class="img-fluid" style="max-width: 50px;" src="{{ asset('assets/keditor/profx/assets/Nomination/independent.svg') }}" alt="Global Reach">
                </div>
                <h3 class="benefit-title">Independent Judging</h3>
                <p class="benefit-description">Entries are reviewed through a structured process focused on relevance, impact, and industry contribution.</p>
            </div>
        </div>
    </section>

     <section id="roadmap" class="roadmap-area pt-130 pb-130">
                    <div class="container custom-container-two">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-8">
                                <div class="section-title text-center mb-60">
                                    <span class="section-title-span"></span>Our Agenda<span class="section-title-span"></span>
                                    <h2 class="title"> <span style="color: #d4af37;">PROFX Awards</span>  Program Agenda  </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="bt-roadmap_x">
                                    <div class="bt-roadmap-wrap">
                                        <div class="bt-roadmap-item">
                                            <span class="roadmap-title">6:00 PM</span>
                                            <div class="roadmap-content">
                                                <span class="dot"></span>
                                                <h4 class="title">Opening Cermony</h4>
                                                <span>Anchor Speech ProFx Into & Teaser</span>
                                                <span>Trophy Launch</span>
                                               
                                            </div>
                                        </div>
                                        <div class="bt-roadmap-item">
                                            <span class="roadmap-title">6:15 PM</span>
                                            <div class="roadmap-content">
                                                <span class="dot"></span>
                                                <h4 class="title">Speaker Speech</h4>
                                                <span>Panel Speaker 1</span>
                                                <span>Panel Speaker 2</span>
                                                <span>Panel Speaker 3</span>
                                            </div>
                                        </div>
                                        <div class="bt-roadmap-item">
                                            <span class="roadmap-title">6:45 PM</span>
                                            <div class="roadmap-content">
                                                <span class="dot"></span>
                                                <h4 class="title">Hi Tea & Entertainment</h4>
                                                <span>Lunch</span>
                                               
                                            </div>
                                        </div>
                                        <div class="bt-roadmap-item">
                                            <span class="roadmap-title">7:00 Pm</span>
                                            <div class="roadmap-content">
                                                <span class="dot"></span>
                                                <h4 class="title">Award Distribution</h4>
                                                <span>30 Awards Distribution</span>
                                              
                                            </div>
                                        </div>
                                        <div class="bt-roadmap-item">
                                            <span class="roadmap-title">8:00 PM</span>
                                            <div class="roadmap-content">
                                                <span class="dot"></span>
                                                <h4 class="title">Entertainment Show</h4>
                                               
                                            </div>
                                        </div>
                                        <div class="bt-roadmap-item">
                                            <span class="roadmap-title">8:15 PM</span>
                                            <div class="roadmap-content">
                                                <span class="dot"></span>
                                                <h4 class="title">Speaker Speech</h4>
                                                <span>Panel Speaker 4</span>
                                                <span>Panel Speaker 5</span>
                                                <span>Panel Speaker 6</span>
                                            </div>
                                        </div>
                                        <div class="bt-roadmap-item">
                                            <span class="roadmap-title">8:45 PM - 10:00 PM</span>
                                            <div class="roadmap-content">
                                                <span class="dot"></span>
                                                <h4 class="title">Entertainment Show30 Awards Distribution</h4>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

  

    <div class="divider"></div>
    
    <script>
  const subcategories = {
    ForexBrokerageExcellenceAwards: [
      "Best Global Forex Broker",
      "Best Emerging Forex Broker- India",
      "Best Multi-Asset Broker",
      "Most Transparent Broker",
      "Best Broker for Beginners",
      "Best Mobile Trading Platform",
      "Best Institutional Broker",
      "Best Customer Support Broker",
      "Best Execution Broker",
      "Best CFD Broker",
      "Best Copy Trading Platform",
      "Best Broker Partnership Program",
      "Fastest Growing Broker",
      "Best Liquidity Provider",
      "Best White Label Solution Provider",
      "Best Broker for Cryptocurrency Trading",
      "Best Newcomer Broker"
      
    ],
    PropFirmAwards: [
      "Best Global Prop Firm",
      "Best Emerging Prop Firm - India",
      "Best Funded Trader Program",
      "Fastest Growing Prop Firm",
      "Best Risk Management Model in Prop Trading",
      "Most Innovative Prop Firm Technology",
      "Best Challenge Platform"
     
    ],
    TechnologyCRMInfrastructure: [
      "Best Trading Technology Provider",
      "Best CRM & Back-Office Solution",
      "Best Bridge / Liquidity Technology",
      "Best Trading Software Developer",
      "Best Risk Management Platform",
      "Best Server & Hosting Infrastructure"
    ],
    FintechPaymentAwards: [
      "Best Fintech Innovation",
      "Best Digital Payment Gateway",
      "Best PSP for Forex Industry",
      "Best Blockchain / Crypto Payment Solution",
      "Best Cross-Border Payment Provider",
      "Best AI-Driven Fintech Platform"
     
    ],
    MarketingMediaAwards: [
      "Best Forex Marketing Agency",
      "Best Broker Branding Campaign",
      "Best Financial Media Platform of the Year",
      "Best Fintech PR / Communications Agency"
    ],
    SpecialExcellenceAwards: [
      "Fintech Innovation Leader of the Year",
      "Outstanding Contribution to Financial Industry"
    ],
    EducationCommunityLeadership: [
      "Best Forex Educator / Academy",
      "Best Trading Community",
      "Best Financial Training Program",
      "Industry Leadership Award",
      "Lifetime Achievement in Fintech & Trading"
    ],
    InfluencerExcellenceAwards: [
      "Best Forex Influencer (Male)",
      "Best Forex Influencer (Female)",
      "Best YouTube Trading Influencer",
      "Best Instagram Trading Influencer",
      "Influencer of the Year"
    ]
  };

  const categorySelect = document.getElementById("category");
  const subcategorySelect = document.getElementById("subcategory");

  categorySelect.addEventListener("change", function () {
    const selected = this.value;
    subcategorySelect.innerHTML = '<option value="">-- Select Subcategory --</option>';

    if (subcategories[selected]) {
      subcategories[selected].forEach(sub => {
        const option = document.createElement("option");
        option.value = sub;
        option.textContent = sub;
        subcategorySelect.appendChild(option);
      });
    }
  });
</script>

<script>
document.getElementById('nominationForm').addEventListener('submit', function(e) {
    e.preventDefault(); // stop default submit
    
    let form = this;
    let errors = [];

    // Get form values
    const company = form.company.value.trim();
    const contact = form.contact.value.trim();
    const jobtitle = form.jobtitle.value.trim();
    const email = form.email.value.trim();
    const confirm_email = form.confirm_email.value.trim();
    const phone = form.phone.value.trim();
    const category = form.category.value;
    const subcategory = form.subcategory.value;
    const country = form.country.value.trim();
    const statement = form.statement.value.trim();
    const description = form.description.value.trim();
    const consent1 = form.consent1.checked;
    const consent2 = form.consent2.checked;

    // Validation
    if(!company) errors.push("Please enter Business / Company Name.");
    if(!contact) errors.push("Please enter Contact Person.");
    if(!jobtitle) errors.push("Please enter Job Title / Role.");
    if(!email) errors.push("Please enter Email.");
    if(email && !/^\S+@\S+\.\S+$/.test(email)) errors.push("Please enter a valid Email.");
    if(!confirm_email) errors.push("Please confirm Email.");
    if(email && confirm_email && email !== confirm_email) errors.push("Emails do not match.");
    if(!phone) errors.push("Please enter Phone Number.");
    if(!category) errors.push("Please select Award Category.");
    if(!subcategory) errors.push("Please select Subcategory.");
    if(!country) errors.push("Please enter Country / Region.");
    if(!statement) errors.push("Please enter Supporting Statement.");
    if(!description) errors.push("Please enter Short Description / Tagline.");
    if(!consent1) errors.push("You must confirm the accuracy of the information.");
    if(!consent2) errors.push("You must consent to ProfX storing your information.");

    // Show errors or submit
    if(errors.length > 0){
        alert("Please fix the following labels:\n\n" + errors.join("\n"));
        return false; // stop submission
    } else {
        // If everything is correct, submit form
        form.submit();
    }
});
</script>


      @endsection