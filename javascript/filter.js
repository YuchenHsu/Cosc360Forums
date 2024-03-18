// filter input box
const filter = $( "#filter" );
//  don't apply a filter
const all_filters = $( "#all" );
all_filters.on("click", function() {
    filter.val("");
});
// filter by news
const news_filter = $( "#news" );
news_filter.on("click", function() {
    filter.val("news");
});
// filter by sports
const sports_filter = $( "#sports" );
sports_filter.on("click", function() {
    filter.val("sports");
});
// filter by travel
const travel_filter = $( "#travel" );
travel_filter.on("click", function() {
    filter.val("travel");
});
// filter by dance
const dance_filter = $( "#dance" );
dance_filter.on("click", function() {
    filter.val("dance");
});
// filter by music
const music_filter = $( "#music" );
music_filter.on("click", function() {
    filter.val("music");
});
// filter by food
const food_filter = $( "#food" );
food_filter.on("click", function() {
    filter.val("food");
});

