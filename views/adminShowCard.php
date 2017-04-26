<?php echo "ADMIN PANEL" ; ?> 
<section class="flex flexWrap">
  <article class="showCard flexColumn" ng-repeat="show in myShows | filter:myFilter | orderBy:'Title'">
    <ul class="flex justifyAround alignEnd controlsList">
      <li class="editBtn controlBtn"><a href="model/edit.php?edit={{show.Id}}">Edit</a></li>
      <li class="deleteBtn controlBtn"><!-- <a href="model/delete.php?delete={{show.Id}}"> -->Delete<!-- </a> --></li>
    </ul>
    <header class=" flexWrap">
      <div class="flex justifyBetween">
        <h1 class="showTitle">{{show.Title}}</h1>
        <p class="showRating">{{show.Rating}}<span class="ten">/10</span></p>
      </div>
      <span class="showGenre">{{show.Genre}}</span>
      <span class="showYear">({{show.Year}})</span>
    </header>
    <img src="img/{{show.Image}}"  height="200" class="showImg selfCenter">
    <p class="showDescr">{{show.Description}}</p>
  </article>
</section>




