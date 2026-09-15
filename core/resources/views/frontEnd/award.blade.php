@extends('frontEnd.layouts.profx')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="trophies-container">
        <div class="award-text">
            <h1>PREVIOUS PROFX AWARDS 2024</h1>
        </div>
    </div>
</div>

<?php
$AwardsLimit = 0; // 0 = all
$Awards = Helper::Topics(Helper::GeneralWebmasterSettings("home_content6_section_id"), 0, $AwardsLimit, 1);
?>

@if(count($Awards) > 0)
<section id="awards" class="aw-awards-section">
    <div class="container-fluid">
        <div class="awards-list" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
            @foreach($Awards as $Topic)
                <?php
                $title_var = 'title_'.App::getLocale();
                $details_var = 'details_'.App::getLocale();

                $title = $Topic->$title_var ?: $Topic->{'title_en'};
                $details = $Topic->$details_var ?: $Topic->{'details_en'};
                $img = $Topic->photo_file ? URL::to('uploads/topics/'.$Topic->photo_file) : asset('assets/keditor/profx/assets/awards-best.png');
                ?>
                <div class="col-md-3 award-card" style="text-align: center; padding: 15px; ">
                    <div class="aw-award-image" style="margin-bottom: 10px;">
                        <img src="{{ $img }}" alt="{{ $title }}" style="width: 100%; height: auto;">
                    </div>
                    <p class="aw-download-label"><strong>Download as</strong></p>
                    <textarea class="aw-code-textarea" readonly style="width: 100%; height: 60px; margin-bottom: 10px; padding: 5px; font-size: 14px; border-radius: 6px; border: 1px solid #ccc;">&lt;a href="https://profxawards.com/awards" target="_blank"&gt;&lt;img src="{{ $img }}" alt="{{ $title }}"&gt;&lt;/a&gt;</textarea>
                    <div class="aw-button-group" style="display: flex; justify-content: center; gap: 10px;">
                        <button class="aw-btn aw-btn-png" data-img="{{ $img }}" style="padding: 6px 12px; font-size: 14px; border-radius: 6px; background-color: #007bff; color: #fff; border: none; cursor: pointer;">PNG</button>
                        <button class="aw-btn aw-btn-copy" style="padding: 6px 12px; font-size: 14px; border-radius: 6px; background-color: #28a745; color: #fff; border: none; cursor: pointer;">COPY CODE</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<script>
document.addEventListener("DOMContentLoaded", function () {
    // COPY CODE FUNCTION
    document.querySelectorAll(".aw-btn-copy").forEach(button => {
        button.addEventListener("click", function () {
            const textarea = this.closest(".award-card").querySelector(".aw-code-textarea");
            if (textarea) {
                textarea.select();
                textarea.setSelectionRange(0, 99999); // For mobile
                document.execCommand("copy");
                this.textContent = "COPIED!";
                setTimeout(() => (this.textContent = "COPY CODE"), 2000);
            }
        });
    });

    // DOWNLOAD PNG FUNCTION
    document.querySelectorAll(".aw-btn-png").forEach(button => {
        button.addEventListener("click", function () {
            const imgUrl = this.getAttribute("data-img");
            const link = document.createElement("a");
            link.href = imgUrl;
            link.download = "award.png";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    });
});
</script>

@endsection
