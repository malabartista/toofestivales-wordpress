<?php

$tpls = new gdTemplates();

$t = new gdTemplate("EWV", __("Element Word Votes", "gd-star-rating"), "%WORD_VOTES%");
$t->add_part(__("Singular", "gd-star-rating"), "singular", "", "none");
$t->add_part(__("Plural", "gd-star-rating"), "plural", "", "none");
$tpls->add_template($t);

$t = new gdTemplate("ETR", __("Element For Alternating Table Rows", "gd-star-rating"), "%TABLE_ROW_CLASS%");
$t->add_part(__("Odd", "gd-star-rating"), "odd", "", "none");
$t->add_part(__("Even", "gd-star-rating"), "even", "", "none");
$tpls->add_template($t);

$t = new gdTemplate("SRR", __("Standard Ratings Results", "gd-star-rating"));
$t->add_template("EWV", "%WORD_VOTES%");
$t->add_template("ETR", "%TABLE_ROW_CLASS%");
$t->add_element("%RATING%", __("article rating", "gd-star-rating"));
$t->add_element("%MAX_RATING%", __("maximum rating value", "gd-star-rating"));
$t->add_element("%REVIEW%", __("article review", "gd-star-rating"));
$t->add_element("%MAX_REVIEW%", __("maximum review value", "gd-star-rating"));
$t->add_element("%VOTES%", __("total votes for article", "gd-star-rating"));
$t->add_element("%TITLE%", __("title", "gd-star-rating"));
$t->add_element("%SLUG%", __("clean name", "gd-star-rating"));
$t->add_element("%TAXONOMY%", __("taxonomy", "gd-star-rating"));
$t->add_element("%PERMALINK%", __("url to post/page", "gd-star-rating"));
$t->add_element("%STARS%", __("rating stars", "gd-star-rating"));
$t->add_element("%THUMB%", __("rating thumb", "gd-star-rating"));
$t->add_element("%BAYES_RATING%", __("bayesian estimate mean rating", "gd-star-rating"));
$t->add_element("%BAYES_STARS%", __("bayesian estimate mean rating stars", "gd-star-rating"));
$t->add_element("%RATE_TREND%", __("article rating trend", "gd-star-rating"));
$t->add_element("%VOTE_TREND%", __("article voting trend", "gd-star-rating"));
$t->add_element("%REVIEW_STARS%", __("article review stars", "gd-star-rating"));
$t->add_element("%COUNT%", __("number of posts/pages", "gd-star-rating"));
$t->add_element("%RANK_ID%", __("results rank id", "gd-star-rating"));
$t->add_element("%ID%", __("post/page id", "gd-star-rating"));
$t->add_element("%IMAGE%", __("image for the post/page", "gd-star-rating"));
$t->add_element("%EXCERPT%", __("short post/page excerpt", "gd-star-rating"));
$t->add_element("%CONTENT%", __("full post/page content", "gd-star-rating"));
$t->add_element("%AUTHOR_NAME%", __("name of the post/page author", "gd-star-rating"));
$t->add_element("%AUTHOR_LINK%", __("url to authors archive", "gd-star-rating"));
$t->add_element("%WORD_VOTES%", __("singular/plural word votes", "gd-star-rating"));
$t->add_element("%TABLE_ROW_CLASS%", __("class for alternating row class", "gd-star-rating"));
$t->add_element("%AUTO_ROW_CLASS%", __("auto generated row classes", "gd-star-rating"));
$t->add_part(__("Header", "gd-star-rating"), "header", "", "none");
$t->add_part(__("Item", "gd-star-rating"), "item", "", "all", "area");
$t->add_part(__("Footer", "gd-star-rating"), "footer", "", "none");
$tpls->add_template($t);

$t = new gdTemplate("SSB", __("Standard RSS Rating Block", "gd-star-rating"));
$t->add_template("EWV", "%WORD_VOTES%");
$t->add_element("%RATING_STARS%", __("rating stars", "gd-star-rating"));
$t->add_element("%RATING%", __("article rating", "gd-star-rating"));
$t->add_element("%MAX_RATING%", __("maximum rating value", "gd-star-rating"));
$t->add_element("%VOTES%", __("total votes for article", "gd-star-rating"));
$t->add_element("%ID%", __("post/page id", "gd-star-rating"));
$t->add_element("%HEADER_TEXT%", __("rating header text", "gd-star-rating"));
$t->add_element("%WORD_VOTES%", __("singular/plural word votes", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", "all");
$tpls->add_template($t);

$t = new gdTemplate("CAR", __("Comments Aggregated Rating", "gd-star-rating"));
$t->add_template("EWV", "%WORD_VOTES%");
$t->add_element("%CMM_RATING%", __("comment rating", "gd-star-rating"));
$t->add_element("%MAX_CMM_RATING%", __("maximum comment rating value", "gd-star-rating"));
$t->add_element("%CMM_COUNT%", __("total comments", "gd-star-rating"));
$t->add_element("%CMM_VOTES%", __("total votes for all comment", "gd-star-rating"));
$t->add_element("%CMM_STARS%", __("comment rating stars", "gd-star-rating"));
$t->add_element("%WORD_VOTES%", __("singular/plural word votes", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", "all");
$tpls->add_template($t);

$t = new gdTemplate("MRT", __("Multi Ratings Text", "gd-star-rating"), "%MUR_RATING_TEXT%");
$t->add_template("EWV", "%WORD_VOTES%");
$t->add_element("%RATING%", __("article rating", "gd-star-rating"));
$t->add_element("%VOTES%", __("total votes for article", "gd-star-rating"));
$t->add_element("%ID%", __("post/page id", "gd-star-rating"));
$t->add_element("%MAX_RATING%", __("maximum rating value", "gd-star-rating"));
$t->add_element("%WORD_VOTES%", __("singular/plural word votes", "gd-star-rating"));
$t->add_element("%TR_YEARS%", __("remaining years", "gd-star-rating"));
$t->add_element("%TR_MONTHS%", __("remaining months", "gd-star-rating"));
$t->add_element("%TR_DAYS%", __("remaining days", "gd-star-rating"));
$t->add_element("%TR_HOURS%", __("remaining hours", "gd-star-rating"));
$t->add_element("%TR_MINUTES%", __("remaining minutes", "gd-star-rating"));
$t->add_element("%TR_SECONDS%", __("remaining seconds", "gd-star-rating"));
$t->add_element("%TR_DATE%", __("end voting date", "gd-star-rating"));
$t->add_element("%TOT_DAYS%", __("total remaining days", "gd-star-rating"));
$t->add_element("%TOT_HOURS%", __("total remaining hours", "gd-star-rating"));
$t->add_element("%TOT_MINUTES%", __("total remaining minutes", "gd-star-rating"));
$t->add_element("%VOTE_VALUE%", __("saved vote value", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", array("%RATING%", "%MAX_RATING%", "%VOTES%", "%ID%", "%WORD_VOTES%"));
$t->add_part(__("Time Restricted Active", "gd-star-rating"), "time_active", "", "all");
$t->add_part(__("Time Restricted Closed", "gd-star-rating"), "time_closed", "", array("%RATING%", "%MAX_RATING%", "%VOTES%", "%ID%", "%WORD_VOTES%"));
$t->add_part(__("Vote Saved", "gd-star-rating"), "vote_saved", "", array("%RATING%", "%MAX_RATING%", "%VOTES%", "%ID%", "%WORD_VOTES%", "%VOTE_VALUE%"));
$tpls->add_template($t);

$t = new gdTemplate("MRS", __("Multi Ratings Stars", "gd-star-rating"), "%MUR_RATING_STARS%");
$t->add_template("ETR", "%TABLE_ROW_CLASS%");
$t->add_element("%ELEMENT_NAME%", __("single element name", "gd-star-rating"));
$t->add_element("%ELEMENT_ID%", __("single element id", "gd-star-rating"));
$t->add_element("%ELEMENT_STARS%", __("single element stars", "gd-star-rating"));
$t->add_element("%ELEMENT_VALUE%", __("single element value", "gd-star-rating"));
$t->add_element("%TABLE_ROW_CLASS%", __("class for alternating row class", "gd-star-rating"));
$t->add_part(__("Item", "gd-star-rating"), "item", "", "all", "area");
$tpls->add_template($t);

$t = new gdTemplate("MRB", __("Multi Ratings Block", "gd-star-rating"));
$t->add_template("MRT", "%MUR_RATING_TEXT%");
$t->add_template("MRS", "%MUR_RATING_STARS%");
$t->add_element("%POST_TITLE%", __("post/page title", "gd-star-rating"));
$t->add_element("%POST_PERMALINK%", __("url to post/page", "gd-star-rating"));
$t->add_element("%RATING%", __("article rating", "gd-star-rating"));
$t->add_element("%VOTES%", __("total votes for article", "gd-star-rating"));
$t->add_element("%ID%", __("post/page id", "gd-star-rating"));
$t->add_element("%MUR_HEADER_TEXT%", __("multi rating header text", "gd-star-rating"));
$t->add_element("%MUR_RATING_TEXT%", __("multi rating text", "gd-star-rating"));
$t->add_element("%MUR_RATING_STARS%", __("multi rating stars", "gd-star-rating"));
$t->add_element("%MUR_CSS_BLOCK%", __("css class for whole block", "gd-star-rating"));
$t->add_element("%MUR_CSS_HEADER%", __("css class for header", "gd-star-rating"));
$t->add_element("%MUR_CSS_TEXT%", __("css class for rating text", "gd-star-rating"));
$t->add_element("%MUR_CSS_BUTTON%", __("css class for rating button", "gd-star-rating"));
$t->add_element("%BUTTON%", __("rating button", "gd-star-rating"));
$t->add_element("%AVG_RATING%", __("average rating", "gd-star-rating"));
$t->add_element("%AVG_RATING_STARS%", __("average rating stars", "gd-star-rating"));
$t->add_element("%CSS_AUTO%", __("auto generated css", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", "all", "area");
$tpls->add_template($t);

$t = new gdTemplate("SRT", __("Standard Ratings Text", "gd-star-rating"), "%RATING_TEXT%");
$t->add_template("EWV", "%WORD_VOTES%");
$t->add_element("%MAX_RATING%", __("maximum rating value", "gd-star-rating"));
$t->add_element("%RATING%", __("article rating", "gd-star-rating"));
$t->add_element("%VOTES%", __("total votes for article", "gd-star-rating"));
$t->add_element("%ID%", __("post/page id", "gd-star-rating"));
$t->add_element("%WORD_VOTES%", __("singular/plural word votes", "gd-star-rating"));
$t->add_element("%TR_YEARS%", __("remaining years", "gd-star-rating"));
$t->add_element("%TR_MONTHS%", __("remaining months", "gd-star-rating"));
$t->add_element("%TR_DAYS%", __("remaining days", "gd-star-rating"));
$t->add_element("%TR_HOURS%", __("remaining hours", "gd-star-rating"));
$t->add_element("%TR_MINUTES%", __("remaining minutes", "gd-star-rating"));
$t->add_element("%TR_SECONDS%", __("remaining seconds", "gd-star-rating"));
$t->add_element("%TR_DATE%", __("end voting date", "gd-star-rating"));
$t->add_element("%TOT_DAYS%", __("total remaining days", "gd-star-rating"));
$t->add_element("%TOT_HOURS%", __("total remaining hours", "gd-star-rating"));
$t->add_element("%TOT_MINUTES%", __("total remaining minutes", "gd-star-rating"));
$t->add_element("%VOTE_VALUE%", __("saved vote value", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", array("%RATING%", "%MAX_RATING%", "%VOTES%", "%ID%", "%WORD_VOTES%"));
$t->add_part(__("Time Restricted Active", "gd-star-rating"), "time_active", "", "all");
$t->add_part(__("Time Restricted Closed", "gd-star-rating"), "time_closed", "", array("%RATING%", "%MAX_RATING%", "%VOTES%", "%ID%", "%WORD_VOTES%"));
$t->add_part(__("Vote Saved", "gd-star-rating"), "vote_saved", "", array("%RATING%", "%MAX_RATING%", "%VOTES%", "%ID%", "%WORD_VOTES%", "%VOTE_VALUE%"));
$tpls->add_template($t);

$t = new gdTemplate("SRB", __("Standard Ratings Block", "gd-star-rating"));
$t->add_template("SRT", "%RATING_TEXT%");
$t->add_element("%POST_TITLE%", __("post/page title", "gd-star-rating"));
$t->add_element("%POST_PERMALINK%", __("url to post/page", "gd-star-rating"));
$t->add_element("%RATING%", __("article rating", "gd-star-rating"));
$t->add_element("%VOTES%", __("total votes for article", "gd-star-rating"));
$t->add_element("%ID%", __("post/page id", "gd-star-rating"));
$t->add_element("%HEADER_TEXT%", __("rating header text", "gd-star-rating"));
$t->add_element("%RATING_STARS%", __("rating stars", "gd-star-rating"));
$t->add_element("%RATING_TEXT%", __("rating text", "gd-star-rating"));
$t->add_element("%CSS_BLOCK%", __("css class for whole block", "gd-star-rating"));
$t->add_element("%CSS_HEADER%", __("css class for header", "gd-star-rating"));
$t->add_element("%CSS_STARS%", __("css class for stars", "gd-star-rating"));
$t->add_element("%CSS_TEXT%", __("css class for rating text", "gd-star-rating"));
$t->add_element("%CSS_AUTO%", __("auto generated css", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", "all", "area");
$tpls->add_template($t);

$t = new gdTemplate("CRT", __("Comments Ratings Text", "gd-star-rating"), "%CMM_RATING_TEXT%");
$t->add_template("EWV", "%WORD_VOTES%");
$t->add_element("%CMM_RATING%", __("comment rating", "gd-star-rating"));
$t->add_element("%MAX_CMM_RATING%", __("maximum comment rating value", "gd-star-rating"));
$t->add_element("%CMM_VOTES%", __("total votes for comment", "gd-star-rating"));
$t->add_element("%WORD_VOTES%", __("singular/plural word votes", "gd-star-rating"));
$t->add_element("%CMM_VOTE_VALUE%", __("saved vote value", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", array("%CMM_RATING%", "%MAX_CMM_RATING%", "%CMM_VOTES%", "%WORD_VOTES%"));
$t->add_part(__("Vote Saved", "gd-star-rating"), "vote_saved", "", "all");
$tpls->add_template($t);

$t = new gdTemplate("CRB", __("Comments Ratings Block", "gd-star-rating"));
$t->add_template("CRT", "%CMM_RATING_TEXT%");
$t->add_element("%CMM_RATING%", __("comment rating", "gd-star-rating"));
$t->add_element("%CMM_VOTES%", __("total votes for comment", "gd-star-rating"));
$t->add_element("%CMM_HEADER_TEXT%", __("rating header text", "gd-star-rating"));
$t->add_element("%CMM_RATING_STARS%", __("rating stars", "gd-star-rating"));
$t->add_element("%CMM_RATING_TEXT%", __("rating text", "gd-star-rating"));
$t->add_element("%CMM_CSS_BLOCK%", __("css class for whole block", "gd-star-rating"));
$t->add_element("%CMM_CSS_HEADER%", __("css class for header", "gd-star-rating"));
$t->add_element("%CMM_CSS_STARS%", __("css class for stars", "gd-star-rating"));
$t->add_element("%CMM_CSS_TEXT%", __("css class for rating text", "gd-star-rating"));
$t->add_element("%CSS_AUTO%", __("auto generated css", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", "all", "area");
$tpls->add_template($t);

$t = new gdTemplate("WSR", __("Widget Star Rating", "gd-star-rating"));
$t->add_template("EWV", "%WORD_VOTES%");
$t->add_template("ETR", "%TABLE_ROW_CLASS%");
$t->add_element("%RATING%", __("article rating", "gd-star-rating"));
$t->add_element("%MAX_RATING%", __("maximum rating value", "gd-star-rating"));
$t->add_element("%REVIEW%", __("article review", "gd-star-rating"));
$t->add_element("%MAX_REVIEW%", __("maximum review value", "gd-star-rating"));
$t->add_element("%VOTES%", __("total votes for article", "gd-star-rating"));
$t->add_element("%TITLE%", __("title", "gd-star-rating"));
$t->add_element("%SLUG%", __("clean name", "gd-star-rating"));
$t->add_element("%TAXONOMY%", __("taxonomy", "gd-star-rating"));
$t->add_element("%PERMALINK%", __("url to post/page", "gd-star-rating"));
$t->add_element("%STARS%", __("rating stars", "gd-star-rating"));
$t->add_element("%THUMB%", __("rating thumb", "gd-star-rating"));
$t->add_element("%BAYES_RATING%", __("bayesian estimate mean rating", "gd-star-rating"));
$t->add_element("%BAYES_STARS%", __("bayesian estimate mean rating stars", "gd-star-rating"));
$t->add_element("%RATE_TREND%", __("article rating trend", "gd-star-rating"));
$t->add_element("%VOTE_TREND%", __("article voting trend", "gd-star-rating"));
$t->add_element("%REVIEW_STARS%", __("article review stars", "gd-star-rating"));
$t->add_element("%COUNT%", __("number of posts/pages", "gd-star-rating"));
$t->add_element("%VOTES_UP%", __("total up votes for article", "gd-star-rating"));
$t->add_element("%VOTES_DOWN%", __("total down votes for article", "gd-star-rating"));
$t->add_element("%RANK_ID%", __("results rank id", "gd-star-rating"));
$t->add_element("%ID%", __("post/page id", "gd-star-rating"));
$t->add_element("%IMAGE%", __("image for the post/page", "gd-star-rating"));
$t->add_element("%EXCERPT%", __("short post/page excerpt", "gd-star-rating"));
$t->add_element("%CONTENT%", __("full post/page content", "gd-star-rating"));
$t->add_element("%AUTHOR_NAME%", __("name of the post/page author", "gd-star-rating"));
$t->add_element("%AUTHOR_LINK%", __("url to authors archive", "gd-star-rating"));
$t->add_element("%WORD_VOTES%", __("singular/plural word votes", "gd-star-rating"));
$t->add_element("%TABLE_ROW_CLASS%", __("class for alternating row class", "gd-star-rating"));
$t->add_element("%AUTO_ROW_CLASS%", __("auto generated row classes", "gd-star-rating"));
$t->add_part(__("Header", "gd-star-rating"), "header", "", "none");
$t->add_part(__("Item", "gd-star-rating"), "item", "", "all", "area");
$t->add_part(__("Footer", "gd-star-rating"), "footer", "", "none");
$tpls->add_template($t);

$t = new gdTemplate("WBR", __("Widget Blog Rating", "gd-star-rating"));
$t->add_template("EWV", "%WORD_VOTES%");
$t->add_element("%RATING%", __("article rating", "gd-star-rating"));
$t->add_element("%MAX_RATING%", __("maximum rating value", "gd-star-rating"));
$t->add_element("%BAYES_RATING%", __("bayesian estimate mean rating", "gd-star-rating"));
$t->add_element("%VOTES%", __("total votes for article", "gd-star-rating"));
$t->add_element("%COUNT%", __("number of posts/pages", "gd-star-rating"));
$t->add_element("%PERCENTAGE%", __("article percentage rating", "gd-star-rating"));
$t->add_element("%WORD_VOTES%", __("singular/plural word votes", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", "all", "area");
$tpls->add_template($t);

$t = new gdTemplate("WCR", __("Widget Comments Rating", "gd-star-rating"));
$t->add_template("EWV", "%WORD_VOTES%");
$t->add_template("ETR", "%TABLE_ROW_CLASS%");
$t->add_element("%CMM_RATING%", __("comment rating", "gd-star-rating"));
$t->add_element("%MAX_CMM_RATING%", __("maximum rating value", "gd-star-rating"));
$t->add_element("%CMM_VOTES%", __("total votes for comment", "gd-star-rating"));
$t->add_element("%COMMENT%", __("comment contents", "gd-star-rating"));
$t->add_element("%PERMALINK%", __("url to comment", "gd-star-rating"));
$t->add_element("%CMM_STARS%", __("rating stars", "gd-star-rating"));
$t->add_element("%POST_ID%", __("post id", "gd-star-rating"));
$t->add_element("%RANK_ID%", __("results rank id", "gd-star-rating"));
$t->add_element("%ID%", __("comment id", "gd-star-rating"));
$t->add_element("%AUTHOR_NAME%", __("name of the comments author", "gd-star-rating"));
$t->add_element("%AUTHOR_LINK%", __("authors url", "gd-star-rating"));
$t->add_element("%AUTHOR_AVATAR%", __("authors avatar", "gd-star-rating"));
$t->add_element("%WORD_VOTES%", __("singular/plural word votes", "gd-star-rating"));
$t->add_element("%TABLE_ROW_CLASS%", __("class for alternating row class", "gd-star-rating"));
$t->add_element("%AUTO_ROW_CLASS%", __("auto generated row classes", "gd-star-rating"));
$t->add_part(__("Header", "gd-star-rating"), "header", "", "none");
$t->add_part(__("Item", "gd-star-rating"), "item", "", "all", "area");
$t->add_part(__("Footer", "gd-star-rating"), "footer", "", "none");
$tpls->add_template($t);

$t = new gdTemplate("RSB", __("Standard Review Rating Block", "gd-star-rating"));
$t->add_element("%CSS_BLOCK%", __("rating header text", "gd-star-rating"));
$t->add_element("%HEADER_TEXT%", __("rating header text", "gd-star-rating"));
$t->add_element("%RATING_STARS%", __("rating stars", "gd-star-rating"));
$t->add_element("%RATING%", __("rating stars", "gd-star-rating"));
$t->add_element("%MAX_RATING%", __("rating stars", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", "all", "area");
$tpls->add_template($t);

$t = new gdTemplate("RCB", __("Comments Review Rating Block", "gd-star-rating"));
$t->add_element("%CMM_RATING_STARS%", __("comment rating stars", "gd-star-rating"));
$t->add_element("%CMM_RATING%", __("comment rating", "gd-star-rating"));
$t->add_element("%MAX_CMM_RATING%", __("maximum comment rating value", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", "all", "area");
$tpls->add_template($t);

$t = new gdTemplate("RMB", __("Multi Review Rating Block", "gd-star-rating"));
$t->add_template("MRS", "%MUR_RATING_STARS%");
$t->add_element("%MUR_RATING_STARS%", __("multi rating stars", "gd-star-rating"));
$t->add_element("%MAX_RATING%", __("maximum comment rating value", "gd-star-rating"));
$t->add_element("%AVG_RATING%", __("average rating", "gd-star-rating"));
$t->add_element("%AVG_RATING_STARS%", __("average rating stars", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", "all", "area");
$tpls->add_template($t);

$t = new gdTemplate("ACR", __("Aggregated Comments Review Rating", "gd-star-rating"));
$t->add_template("EWV", "%WORD_VOTES%");
$t->add_element("%CMM_RATING%", __("comment rating", "gd-star-rating"));
$t->add_element("%MAX_CMM_RATING%", __("maximum comment rating value", "gd-star-rating"));
$t->add_element("%CMM_VOTES%", __("total votes for all comment", "gd-star-rating"));
$t->add_element("%CMM_STARS%", __("comment rating stars", "gd-star-rating"));
$t->add_element("%WORD_VOTES%", __("singular/plural word votes", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", "all");
$tpls->add_template($t);

$t = new gdTemplate("MRE", __("Multi Review Editor", "gd-star-rating"));
$t->add_template("MRS", "%MUR_RATING_STARS%");
$t->add_element("%MUR_RATING_STARS%", __("multi rating stars", "gd-star-rating"));
$t->add_element("%MUR_CSS_BLOCK%", __("css class for whole block", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", "all", "area");
$tpls->add_template($t);

$t = new gdTemplate("MRI", __("Multi Rating Comment Integration", "gd-star-rating"));
$t->add_template("MRS", "%MUR_RATING_STARS%");
$t->add_element("%MUR_RATING_STARS%", __("multi rating stars", "gd-star-rating"));
$t->add_element("%MUR_CSS_BLOCK%", __("css class for whole block", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", "all", "area");
$tpls->add_template($t);

$t = new gdTemplate("MCR", __("Multi Rating Comment Integration Result", "gd-star-rating"));
$t->add_element("%ID%", __("post/page id", "gd-star-rating"));
$t->add_element("%MAX_RATING%", __("maximum rating value", "gd-star-rating"));
$t->add_element("%AVG_RATING%", __("average rating", "gd-star-rating"));
$t->add_element("%AVG_RATING_STARS%", __("average rating stars", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", "all", "area");
$tpls->add_template($t);

$t = new gdTemplate("TAT", __("Thumbs Article Ratings Text", "gd-star-rating"), "%THUMBS_TEXT%");
$t->add_template("EWV", "%WORD_VOTES%");
$t->add_element("%ID%", __("post/page id", "gd-star-rating"));
$t->add_element("%RATING%", __("article rating", "gd-star-rating"));
$t->add_element("%PERCENTAGE%", __("article percentage rating", "gd-star-rating"));
$t->add_element("%VOTES%", __("total votes for article", "gd-star-rating"));
$t->add_element("%VOTES_UP%", __("total up votes for article", "gd-star-rating"));
$t->add_element("%VOTES_DOWN%", __("total down votes for article", "gd-star-rating"));
$t->add_element("%VOTE_VALUE%", __("saved vote value", "gd-star-rating"));
$t->add_element("%WORD_VOTES%", __("singular/plural word votes", "gd-star-rating"));
$t->add_element("%TR_YEARS%", __("remaining years", "gd-star-rating"));
$t->add_element("%TR_MONTHS%", __("remaining months", "gd-star-rating"));
$t->add_element("%TR_DAYS%", __("remaining days", "gd-star-rating"));
$t->add_element("%TR_HOURS%", __("remaining hours", "gd-star-rating"));
$t->add_element("%TR_MINUTES%", __("remaining minutes", "gd-star-rating"));
$t->add_element("%TR_SECONDS%", __("remaining seconds", "gd-star-rating"));
$t->add_element("%TR_DATE%", __("end voting date", "gd-star-rating"));
$t->add_element("%TOT_DAYS%", __("total remaining days", "gd-star-rating"));
$t->add_element("%TOT_HOURS%", __("total remaining hours", "gd-star-rating"));
$t->add_element("%TOT_MINUTES%", __("total remaining minutes", "gd-star-rating"));
$t->add_element("%CSS_AUTO%", __("auto generated css", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", array("%RATING%", "%VOTES_TOTAL%", "%VOTES_UP%", "%VOTES_DOWN%", "%ID%", "%WORD_VOTES%"));
$t->add_part(__("Time Restricted Active", "gd-star-rating"), "time_active", "", "all");
$t->add_part(__("Time Restricted Closed", "gd-star-rating"), "time_closed", "", array("%RATING%", "%VOTES_TOTAL%", "%VOTES_UP%", "%VOTES_DOWN%", "%ID%", "%WORD_VOTES%"));
$t->add_part(__("Vote Saved", "gd-star-rating"), "vote_saved", "", array("%RATING%", "%VOTES_TOTAL%", "%VOTES_UP%", "%VOTES_DOWN%", "%ID%", "%WORD_VOTES%", "%VOTE_VALUE%"));
$tpls->add_template($t);

$t = new gdTemplate("TAB", __("Thumbs Article Rating Block", "gd-star-rating"));
$t->add_template("TAT", "%THUMBS_TEXT%");
$t->add_element("%THUMB_DOWN%", __("thumb down image style", "gd-star-rating"));
$t->add_element("%THUMB_UP%", __("thumb up image style", "gd-star-rating"));
$t->add_element("%HEADER_TEXT%", __("rating header text", "gd-star-rating"));
$t->add_element("%THUMBS_TEXT%", __("rating text", "gd-star-rating"));
$t->add_element("%ID%", __("post/page id", "gd-star-rating"));
$t->add_element("%RATING%", __("article rating", "gd-star-rating"));
$t->add_element("%PERCENTAGE%", __("article percentage rating", "gd-star-rating"));
$t->add_element("%VOTES%", __("total votes for article", "gd-star-rating"));
$t->add_element("%VOTES_UP%", __("total up votes for article", "gd-star-rating"));
$t->add_element("%VOTES_DOWN%", __("total down votes for article", "gd-star-rating"));
$t->add_element("%VOTE_VALUE%", __("saved vote value", "gd-star-rating"));
$t->add_element("%CSS_BLOCK%", __("css class for whole block", "gd-star-rating"));
$t->add_element("%CSS_HEADER%", __("css class for header", "gd-star-rating"));
$t->add_element("%CSS_THUMBS%", __("css class for stars", "gd-star-rating"));
$t->add_element("%CSS_TEXT%", __("css class for rating text", "gd-star-rating"));
$t->add_element("%CSS_AUTO%", __("auto generated css", "gd-star-rating"));
$t->add_part(__("Inactive", "gd-star-rating"), "inactive", "", "all", "area");
$t->add_part(__("Active", "gd-star-rating"), "active", "", "all", "area");
$tpls->add_template($t);

$t = new gdTemplate("TCT", __("Thumbs Comment Ratings Text", "gd-star-rating"), "%CMM_THUMBS_TEXT%");
$t->add_template("EWV", "%WORD_VOTES%");
$t->add_element("%ID%", __("post/page id", "gd-star-rating"));
$t->add_element("%RATING%", __("comment rating", "gd-star-rating"));
$t->add_element("%PERCENTAGE%", __("comment percentage rating", "gd-star-rating"));
$t->add_element("%VOTES%", __("total votes for article", "gd-star-rating"));
$t->add_element("%VOTES_UP%", __("total up votes for article", "gd-star-rating"));
$t->add_element("%VOTES_DOWN%", __("total down votes for article", "gd-star-rating"));
$t->add_element("%VOTE_VALUE%", __("saved vote value", "gd-star-rating"));
$t->add_element("%WORD_VOTES%", __("singular/plural word votes", "gd-star-rating"));
$t->add_element("%CSS_AUTO%", __("auto generated css", "gd-star-rating"));
$t->add_part(__("Normal", "gd-star-rating"), "normal", "", array("%RATING%", "%VOTES_TOTAL%", "%VOTES_UP%", "%VOTES_DOWN%", "%ID%", "%WORD_VOTES%"));
$t->add_part(__("Vote Saved", "gd-star-rating"), "vote_saved", "", "all");
$tpls->add_template($t);

$t = new gdTemplate("TCB", __("Thumbs Comment Rating Block", "gd-star-rating"));
$t->add_template("TCT", "%CMM_THUMBS_TEXT%");
$t->add_element("%THUMB_DOWN%", __("thumb down image style", "gd-star-rating"));
$t->add_element("%THUMB_UP%", __("thumb up image style", "gd-star-rating"));
$t->add_element("%ID%", __("post/page id", "gd-star-rating"));
$t->add_element("%RATING%", __("comment rating", "gd-star-rating"));
$t->add_element("%PERCENTAGE%", __("comment percentage rating", "gd-star-rating"));
$t->add_element("%VOTES%", __("total votes for article", "gd-star-rating"));
$t->add_element("%VOTES_UP%", __("total up votes for article", "gd-star-rating"));
$t->add_element("%VOTES_DOWN%", __("total down votes for article", "gd-star-rating"));
$t->add_element("%VOTE_VALUE%", __("saved vote value", "gd-star-rating"));
$t->add_element("%CMM_THUMBS_TEXT%", __("rating text", "gd-star-rating"));
$t->add_element("%CMM_HEADER_TEXT%", __("rating header text", "gd-star-rating"));
$t->add_element("%CMM_CSS_BLOCK%", __("css class for whole block", "gd-star-rating"));
$t->add_element("%CMM_CSS_HEADER%", __("css class for header", "gd-star-rating"));
$t->add_element("%CMM_CSS_STARS%", __("css class for stars", "gd-star-rating"));
$t->add_element("%CMM_CSS_TEXT%", __("css class for rating text", "gd-star-rating"));
$t->add_element("%CSS_AUTO%", __("auto generated css", "gd-star-rating"));
$t->add_part(__("Inactive", "gd-star-rating"), "inactive", "", "all", "area");
$t->add_part(__("Active", "gd-star-rating"), "active", "", "all", "area");
$tpls->add_template($t);

?>