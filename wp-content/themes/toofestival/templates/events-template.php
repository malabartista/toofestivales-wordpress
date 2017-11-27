
<!-- EventBuilder Grid -->
<div class="col-sm-4" itemscope itemtype="http://schema.org/Festival">
	<div class="listing-container">
		<a class="listing-container-big-button" itemprop="url" href="#_EVENTURL"></a>
		<div class="listing-container-block">
			<div class="listing-container-block-body">
				<div class="listing-block-title">
					<a href="#_EVENTURL"><span itemprop="name">#_EVENTNAME</span></a>
					<meta itemprop="startDate" content="#_{Y-m-d}">
					<meta itemprop="endDate" content="#@_{Y-m-d}">
					<div class="row hidden">{has_image}#_CUSTOMEVENTIMAGEMEDIUM{/has_image}</div>
					<div class="row hidden"><span itemprop="description" >#_EVENTEXCERPT </span></div>
					<span class="listing-container-event-place" itemprop="location" itemscope itemtype="http://schema.org/Place">
						<span itemprop="name" class="hidden">#_LOCATIONNAME</span>
	                    <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
	                        <span itemprop="streetAddress" class="hidden">#_LOCATIONADDRESS</span>
	                        <span class="fa fa-map-marker"></span><span itemprop="addressLocality">  #_LOCATIONTOWN</span>,
	                        <span itemprop="addressRegion" class="hidden">#_LOCATIONSTATE</span>
	                    </span>
	                     #_LOCATIONCOUNTRY
	                    <span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
	                        <meta itemprop="latitude" content="#_LOCATIONLATITUDE" />
	                        <meta itemprop="longitude" content="#_LOCATIONLONGITUDE" />
	                    </span>
					</span>
					<div class="listing-container-categories">
						<i class="fa fa-music"></i>#_EVENTCATEGORIES
					</div>
				</div>
				<div class="listing-container-dates">
					<i class="fa fa-calendar"></i>
					<span>#_EVENTDATES</span>
				</div>
				<div class="listing-container-views">
					<i class="fa fa-eye"></i>
					<span>#_EVENTVIEWS</span>
				</div>
				<div class="listing-container-bookmarks">
					<i class="fa fa-heart"></i>
					<span>#_EVENTBOOKMARKS</span>
				</div>
			</div>
		</div>
		<div class="listing-container-black-shadow"></div>
		<div class="listing-container-image-bg" style="background: #fff url(#_EVENTIMAGEURL) no-repeat center center;"></div>
	</div>
</div>

<!-- EventBuilder List -->
<div class="col-sm-12">
	<div class="listing-list-container">
		<div class="list-view-image" style="background-image: url(\'#_EVENTIMAGEURL\');"></div>
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-8" style="background-color: #fff;">
				<div class="listing-list-content-block">
					<h4><a href="#_EVENTURL">#_EVENTNAME</a></h4>
					<span class="listing-container-tagline">
						<i class="fa fa-map-marker"></i>
						#_LOCATIONNAME -
						#_LOCATIONADDRESS,
						#_LOCATIONTOWN,
						#_LOCATIONSTATE
						#_LOCATIONPOSTCODE,
						#_LOCATIONCOUNTRY
					</span>
					<div class="listing-container-block-body">
						<div class="listing-container-dates">
							<i class="fa fa-calendar"></i>
					        <span>#_EVENTDATES</span>
						</div>
						<div class="listing-container-views">
							<i class="fa fa-eye"></i>
							<span>#_EVENTVIEWS</span>
						</div>
						<div class="listing-container-bookmarks">
							<i class="fa fa-heart"></i>
							<span>#_EVENTBOOKMARKS</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Location Next Events -->
<div class="marker-holder row">
	<div class="marker-content">
		<div class="marker-image">
			{has_image}#_CUSTOMEVENTIMAGEMEDIUM{/has_image}
		</div>
		<div class="marker-info-holder">
			<div class="marker-info">
				<div class="marker-info-title">
					<a href="#_EVENTURL">#_EVENTNAME</a>
					<span class="marker-meta"><i class="fa fa-calendar"></i>#_EVENTDATES</span>
					<span class="marker-meta"><i class="fa fa-eye"></i>#_EVENTVIEWS</span>
					<span class="marker-meta"><i class="fa fa-music"></i>#_EVENTCATEGORIES</span>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Location Events -->
<div class="col-sm-12 event-block">
	<div class="upcoming-events-v2">
		<a class="upcoming-events-big-button" href="#_EVENTURL"></a>
		<div class="row">
			<div class="col-sm-2 upcoming-events-number">
				<h2>1</h2>
			</div>
			<div class="col-sm-7 upcoming-events-title">
				<div class="upcoming-events-avatar">
					{has_image}#_CUSTOMEVENTIMAGEMEDIUM{/has_image}
				</div>
				<div class="upcoming-events-title-cont">
					<h6><a href="#_EVENTURL">#_EVENTNAME</a></h6>
					<div class="full">
						<span>#_EVENTEXCERPT</span>
					</div>
				</div>
			</div>
			<div class="col-sm-3 upcoming-events-details hidden-xs">
				<div class="full">
					#_CUSTOMEVENTRATING
				</div>
			</div>
		</div>
	</div>
</div>

<!-- The Grid Infinite Scroll -->
<div class="container">
	<div id="grid" class="grid">
		<div id="posts" class="posts">


			<div class="post event-#_EVENTPOSTID" itemscope itemtype="http://schema.org/Festival">
			    <a href="#_EVENTURL" itemprop="url" class="img-zoom" title="#_EVENTNAME">
			        {has_image}#_CUSTOMEVENTIMAGEMEDIUM{/has_image}
			        {no_image}<img src="http://toofestival.es/media/2014/01/Festivales-300x168.jpg" alt="#_EVENTNAME">{/no_image}
			    </a>
			    <div class="caption" style="border-top: 2px solid  #_CATEGORYCOLOR">
			        <div class="caption-text">
			            <div class="row"><a href="#_EVENTURL" title="#_EVENTNAME"><h4 itemprop="name">#_EVENTNAME</h4></a></div>
						<meta itemprop="startDate" content="#_{Y-m-d}">
						<meta itemprop="endDate" content="#@_{Y-m-d}">
						<div class="row hidden"><span itemprop="description" >#_EVENTEXCERPT </span></div>
			            <div class="row"><i class="fa fa-music"></i>   #_EVENTCATEGORIES</div>
			            <div class="row location">
			                <span itemprop="location" itemscope itemtype="http://schema.org/Place" >
			                    <span itemprop="name" class="hidden">#_LOCATIONNAME</span>
			                    <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
			                        <span itemprop="streetAddress" class="hidden">#_LOCATIONADDRESS</span>
			                        <span class="glyphicon glyphicon-map-marker"></span><span itemprop="addressLocality">  #_LOCATIONTOWN</span>, 
			                        <span itemprop="addressRegion" class="hidden">#_LOCATIONSTATE</span>
			                    </span>
			                     #_LOCATIONCOUNTRY
			                    <span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
			                        <meta itemprop="latitude" content="#_LOCATIONLATITUDE" />
			                        <meta itemprop="longitude" content="#_LOCATIONLONGITUDE" />
			                    </span>
			                </span>
			            </div>
			        </div>
			    </div>
			    <div class="caption-data">
			        <div class="eventdates">
			            <i class="fa fa-calendar-o"></i>    #_EVENTDATES
			        </div>
			        <div class="eventviewed">
			           #_EVENTVIEWS
			        </div>
			        <div class="eventratings">
			            #_CUSTOMEVENTRATING
			        </div>
			    </div>
			</div>


		</div>
	</div>
</div>