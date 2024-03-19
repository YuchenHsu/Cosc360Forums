$(document).ready(function() {
    // filter input box
    const filter = $( "#filter" );
    const filter_nav = $( "#filter_nav" );
    const news_filter = $( "#news" );
    const sports_filter = $( "#sports" );
    const travel_filter = $( "#travel" );
    const dance_filter = $( "#dance" );
    const music_filter = $( "#music" );
    const food_filter = $( "#food" );
    const all_filters = $( "#all" );

    //  don't apply a filter
    all_filters.on("click", function() {
        filter.val("");
        filter_nav.css("backgroundColor", "purple");
        news_filter.css("backgroundColor", "purple");
        sports_filter.css("backgroundColor", "purple");
        travel_filter.css("backgroundColor", "purple");
        dance_filter.css("backgroundColor", "purple");
        music_filter.css("backgroundColor", "purple");
        food_filter.css("backgroundColor", "purple");
        all_filters.css("backgroundColor", "#ff6f59");
    });
    // filter by news
    news_filter.on("click", function() {
        filter.val("news");
        filter_nav.css("backgroundColor", "purple");
        sports_filter.css("backgroundColor", "purple");
        travel_filter.css("backgroundColor", "purple");
        dance_filter.css("backgroundColor", "purple");
        music_filter.css("backgroundColor", "purple");
        food_filter.css("backgroundColor", "purple");
        all_filters.css("backgroundColor", "purple");
        news_filter.css("backgroundColor", "#ff6f59");

    });
    // filter by sports
    sports_filter.on("click", function() {
        filter.val("sports");
        filter_nav.css("backgroundColor", "purple");
        news_filter.css("backgroundColor", "purple");
        sports_filter.css("backgroundColor", "#ff6f59");
        travel_filter.css("backgroundColor", "purple");
        dance_filter.css("backgroundColor", "purple");
        music_filter.css("backgroundColor", "purple");
        food_filter.css("backgroundColor", "purple");
        all_filters.css("backgroundColor", "purple");

    });
    // filter by travel
    travel_filter.on("click", function() {
        filter.val("travel");
        filter_nav.css("backgroundColor", "purple");
        news_filter.css("backgroundColor", "purple");
        sports_filter.css("backgroundColor", "purple");
        travel_filter.css("backgroundColor", "#ff6f59");
        dance_filter.css("backgroundColor", "purple");
        music_filter.css("backgroundColor", "purple");
        food_filter.css("backgroundColor", "purple");
        all_filters.css("backgroundColor", "purple");

    });
    // filter by dance
    dance_filter.on("click", function() {
        filter.val("dance");
        filter_nav.css("backgroundColor", "purple");
        news_filter.css("backgroundColor", "purple");
        sports_filter.css("backgroundColor", "purple");
        travel_filter.css("backgroundColor", "purple");
        music_filter.css("backgroundColor", "purple");
        food_filter.css("backgroundColor", "purple");
        all_filters.css("backgroundColor", "purple");
        dance_filter.css("backgroundColor", "#ff6f59");

    });
    // filter by music
    music_filter.on("click", function() {
        filter.val("music");
        filter_nav.css("backgroundColor", "purple");
        news_filter.css("backgroundColor", "purple");
        sports_filter.css("backgroundColor", "purple");
        travel_filter.css("backgroundColor", "purple");
        dance_filter.css("backgroundColor", "purple");
        food_filter.css("backgroundColor", "purple");
        all_filters.css("backgroundColor", "purple");
        music_filter.css("backgroundColor", "#ff6f59");
    });
    // filter by food
    food_filter.on("click", function() {
        filter.val("food");
        filter_nav.css("backgroundColor", "purple");
        news_filter.css("backgroundColor", "purple");
        sports_filter.css("backgroundColor", "purple");
        travel_filter.css("backgroundColor", "purple");
        dance_filter.css("backgroundColor", "purple");
        music_filter.css("backgroundColor", "purple");
        all_filters.css("backgroundColor", "purple");
        food_filter.css("backgroundColor", "#ff6f59");
    });
});

