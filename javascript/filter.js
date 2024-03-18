$(document).ready(function() {
    // filter input box
    const filter = $( "#filter" );
    const filter_nav = $( "#filter_nav" );
    //  don't apply a filter
    const all_filters = $( "#all" );
    all_filters.on("click", function() {
        filter.val("");
        filter_nav.css("backgroundColor", "purple");
        all_filters.css("backgroundColor", "#ff6f59");
    });
    // filter by news
    const news_filter = $( "#news" );
    news_filter.on("click", function() {
        filter.val("news");
        filter_nav.css("backgroundColor", "purple");
        news_filter.css("backgroundColor", "#ff6f59");

    });
    // filter by sports
    const sports_filter = $( "#sports" );
    sports_filter.on("click", function() {
        filter.val("sports");
        filter_nav.css("backgroundColor", "purple");
        sports_filter.css("backgroundColor", "#ff6f59");

    });
    // filter by travel
    const travel_filter = $( "#travel" );
    travel_filter.on("click", function() {
        filter.val("travel");
        filter_nav.css("backgroundColor", "purple");
        travel_filter.css("backgroundColor", "#ff6f59");

    });
    // filter by dance
    const dance_filter = $( "#dance" );
    dance_filter.on("click", function() {
        filter.val("dance");
        filter_nav.css("backgroundColor", "purple");
        dance_filter.css("backgroundColor", "#ff6f59");

    });
    // filter by music
    const music_filter = $( "#music" );
    music_filter.on("click", function() {
        filter.val("music");
        filter_nav.css("backgroundColor", "purple");
        music_filter.css("backgroundColor", "#ff6f59");
    });
    // filter by food
    const food_filter = $( "#food" );
    food_filter.on("click", function() {
        filter.val("food");
        filter_nav.css("backgroundColor", "purple");
        food_filter.css("backgroundColor", "#ff6f59");
    });
});

