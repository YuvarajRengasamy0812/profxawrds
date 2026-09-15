@extends('frontEnd.layouts.profx')

@section('content')

<!-- Hero Section -->
<div class="hero-section">
    <div class="trophies-container">
        <div class="award-text">
            <h1>PROFX AWARDS 2025</h1>
        </div>
    </div>
</div>

@php
use Illuminate\Support\Facades\DB;

// topic_id = 336
$Awards = DB::table('photos')
            ->where('topic_id', 336)
            ->orderBy('row_no', 'ASC')
            ->get();
@endphp

@if(count($Awards) > 0)
<section id="awards" class="aw-awards-section">
    <div class="container-fluid">
        <div class="awards-list" style="display:flex;flex-wrap:wrap;gap:20px;justify-content:center;">

            @foreach($Awards as $award)
                @php
                    $title = $award->title ?? 'PROFX Award';

               
                        $img = !empty( $award->file)
                        ? asset('uploads/topics/' .$award->file)
                        : asset('assets/keditor/profx/assets/awards-best.png');
                @endphp

                <div class="col-md-3 award-card" style="text-align:center;padding:15px;">

                    <div class="aw-award-image" style="margin-bottom:10px;">
                        <img src="{{ $img }}" alt="{{ $title }}" style="width:100%;height:auto;">
                    </div>

                    <p class="aw-download-label"><strong></strong></p>

                    <textarea class="aw-code-textarea" readonly
                        style="width:100%;height:60px;margin-bottom:10px;padding:5px;border-radius:6px;border:1px solid #ccc;">
<a href="https://profxawards.com/awards" target="_blank">
<img src="{{ $img }}" alt="{{ $title }}">
</a>
                    </textarea>

                    <div class="aw-button-group" style="display:flex;justify-content:center;gap:10px;">
                        <button class="aw-btn aw-btn-png" data-img="{{ $img }}"
                            style="padding:6px 12px;border-radius:6px;background:#007bff;color:#fff;border:none;">
                            PNG
                        </button>

                        <button class="aw-btn aw-btn-copy"
                            style="padding:6px 12px;border-radius:6px;background:#28a745;color:#fff;border:none;">
                            COPY CODE
                        </button>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
</section>
@endif

<script>
document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".aw-btn-copy").forEach(btn => {
        btn.addEventListener("click", function () {
            const textarea = this.closest(".award-card").querySelector(".aw-code-textarea");
            textarea.select();
            document.execCommand("copy");
            this.textContent = "COPIED!";
            setTimeout(() => this.textContent = "COPY CODE", 2000);
        });
    });

    document.querySelectorAll(".aw-btn-png").forEach(btn => {
        btn.addEventListener("click", function () {
            const url = this.getAttribute("data-img");
            const a = document.createElement("a");
            a.href = url;
            a.download = "award.png";
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        });
    });

});
</script>

@endsection
