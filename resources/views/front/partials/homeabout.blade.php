<div class="w-section about-section">
    <h1 class="section-heading">ABOUT</h1>
    <div class="about-blurb">
        <p class="p1 intro-black">{{ $homePage->present()->area('About intro') }}</p>
    </div>
    <div class="w-container about-container">
        <div class="w-row">
            <div class="w-col w-col-4 about-column">
                <h3 class="about-heading">MISSION</h3><img src="build/images/mission.png" class="about-icon">
                <div class="p1 black">{{ $homePage->present()->area('Mission - short') }}</div>
                <div id="see-mission-btn" class="w-button button red">MORE</div>
            </div>
            <div class="w-col w-col-4 about-column">
                <h3 class="about-heading">VISION</h3><img src="build/images/vision.png" class="about-icon">
                <div class="p1 black">{{ $homePage->present()->area('Vision - short') }}</div>
                <div id="see-vision-btn" class="w-button button red">MORE</div>
            </div>
            <div class="w-col w-col-4 about-column">
                <h3 class="about-heading">OBJECTIVES</h3><img src="build/images/objectives.png" class="about-icon">
                <div class="p1 black">{{ $homePage->present()->area('Objectives - short') }}</div>
                <div id="see-objectives-btn" class="w-button button red">MORE</div>
            </div>
        </div>
    </div>
</div>
<div class="w-section mission-section" id="about-panel">
    <div class="w-container mission-container" id="mission-block">
        <h3 class="about-heading white">MISSION</h3>
        <div class="p1 white">{{ $homePage->present()->area('Mission - long') }}</div>
    </div>
    <div class="w-container mission-container" id="vision-block">
        <h3 class="about-heading white">VISION</h3>
        <div class="p1 white">{{ $homePage->present()->area('Vision - long') }}</div>
    </div>
    <div class="w-container mission-container" id="objectives-block">
        <h3 class="about-heading white">OBJECTIVES</h3>
        <div class="p1 white">{{ $homePage->present()->area('Objectives - long') }}</div>
    </div>
    <a href="/about" class="w-button button-big white">READ MORE ABOUT EXPEDITIONIST.ORG</a>
</div>