<nav class="navbar navbar-expand-lg navbar-dark fixed-top rtmenu" id="mainNav">
         <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('/assets/front/images')); ?>/logo.png"></a>     
            <div class="collapse navbar-collapse">
               <button class="navbar-toggler nav-close" type="button" >
               <i class="fa fa-bars nvbar" aria-hidden="true"></i>
               <i class="fa fa-times nvclose" aria-hidden="true"></i>
               </button>
               <ul class="navbar-nav text-uppercase ml-auto">
                  <li class="nav-item">
                     <a class="nav-link <?php echo e(get_rami_active_menu('')); ?> js-scroll-trigger" href="<?php echo e(url('/')); ?>">דף הבית</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a href="#"  class="nav-link <?php echo e(get_rami_active_menu('vacation-packages')); ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">חבילות נופש</a> 
                     <ul class="dropdown-menu" role="menu">
                        <li class=""><a href="<?php echo e(url('/package-category/21')); ?>" class="dropdown-item">חבילות נופש באיזור היער השחור גרמניה</a></li>
                         
                         <li class=""><a href="<?php echo e(url('/package-category/55')); ?>" class="dropdown-item">כחבילות הנופש באיזור זלצבורג אוסטריה  </a></li>
                         <!-- <li class=""><a href="<?php echo e(url('/package-category/53')); ?>" class="dropdown-item">חבילות נופש לאוסטריה בסוכות</a></li> -->
                         <li class=""><a href="<?php echo e(url('/package-category/82')); ?>" class="dropdown-item">חבילות נופש להולנד  </a></li>
                         <li class=""><a href="<?php echo e(url('/package-category/54')); ?>" class="dropdown-item">חבילות נופש לאוסטריה טירול</a></li>
                     </ul>
                  </li>
                
                  <li class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle  <?php echo e(get_rami_active_menu('accommodation')); ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">אפשרויות לינה</a>
                     <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-item dropdown">
                           <a href="#" class="dropdown-toggle <?php echo e(get_rami_active_menu('accommodation')); ?>">
                       לינה בגרמניה  </a>
                           <ul class="dropdown-menu">
                              <li class="dropdown-item"><a href="<?php echo e(url('/loc-accommodation/21')); ?>">לינה ביער השחור</a></li>
                              <li class="dropdown-item"><a href="<?php echo e(url('/loc-accommodation/43')); ?>">לינה בפרייבורג</a></li>
                              <li class="dropdown-item"><a href="<?php echo e(url('/loc-accommodation/49')); ?>">לינה בברלין</a></li>
                              <li class="dropdown-item"><a href="<?php echo e(url('/loc-accommodation/44')); ?>">לינה במינכן</a></li>
                              <li class="dropdown-item"><a href="<?php echo e(url('/loc-accommodation/45')); ?>">לינה בפרנקפורט</a></li>
                              <li class="dropdown-item"><a href="<?php echo e(url('/loc-accommodation/47')); ?>">לינה באוגסבורג</a></li>
                              <li class="dropdown-item"><a href="<?php echo e(url('/loc-accommodation/104')); ?>">לינה באגם קונסטנץ</a></li>
                              <li class="dropdown-item"><a href="<?php echo e(url('/loc-accommodation/48')); ?>">לינה בהיידלברג</a></li>
                              <li class="dropdown-item"><a href="<?php echo e(url('/loc-accommodation/30')); ?>">לינה בפארק אירופה</a></li>
                           </ul>
                        </li>
                        <li class="dropdown-item dropdown">
                           <a href="#" class="dropdown-toggle <?php echo e(get_rami_active_menu('accommodation')); ?> ">לינה באוסטריה</a>
                           <ul class="dropdown-menu">
                              <li class="dropdown-item"><a href="<?php echo e(url('/loc-accommodation/54')); ?>">לינה בטירול</a></li>
                              <li class="dropdown-item"><a href="<?php echo e(url('/loc-accommodation/55')); ?>">לינה בזלצבורג</a></li>
                           </ul>
                        </li>
                        <li class=""><a href="<?php echo e(url('/loc-accommodation/82')); ?>" class="dropdown-item">לינה בהולנד</a></li>
                     </ul>
                  </li>
                  <li class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle <?php echo e(get_rami_active_menu('flights')); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">טיסות</a>
                     <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-item dropdown">
                           <a href="#" class="dropdown-toggle <?php echo e(get_rami_active_menu('flights')); ?>">
                         טיסות ליער השחור  </a>
                           <ul class="dropdown-menu">                      
                              <li><a href="<?php echo e(url('/flights/44')); ?>" class="dropdown-item">טיסות למינכן</a></li>
                              <li><a href="<?php echo e(url('/flights/45')); ?>" class="dropdown-item">טיסות לפרנקפורט</a></li>
                              <li><a href="<?php echo e(url('/flights/71')); ?>" class="dropdown-item">טיסות לציריך</a></li>
                           </ul>
                        </li>
                        <li><a href="<?php echo e(url('/flights/81')); ?>" class="dropdown-item">טיסות לבריסל</a>
                        </li>
                        <li class="dropdown-item dropdown">
                           <a href="#" class="dropdown-toggle <?php echo e(get_rami_active_menu('flights')); ?>">
                           טיסות לזלצבורג </a>
                           <ul class="dropdown-menu">  
                               <li><a href="<?php echo e(url('/flights/64')); ?>" class="dropdown-item">טיסות לוינה </a></li>
                               <li><a href="<?php echo e(url('/flights/44')); ?>" class="dropdown-item">טטיסות למינכן </a></li>
                           </ul>
                        </li>

                     </ul>
                  </li>                  
                  <li class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle <?php echo e(get_rami_active_menu('blackforest-cards')); ?> " id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">כרטיסי היער השחור</a>
                     <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo e(url('/הכרטיס-האדום-של-היער-השחור-hochschwarzwald-card')); ?>" class="dropdown-item">כרטיס אדום</a></li>
                        <li><a href="<?php echo e(url('/כרטיס-היער-השחור-החדש-schwarzwaldcard')); ?>" class="dropdown-item">הכרטיס השחור החדש</a></li>
                        <li><a href="<?php echo e(url('/כרטיס-הקונוס-של-היער-השחור-konus')); ?>" class="dropdown-item">כרטיס קונוס</a></li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link js-scroll-trigger <?php echo e(get_rami_active_menu('testimonials')); ?>" href="<?php echo e(url('/testimonials')); ?>">המלצות לקוחות</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link js-scroll-trigger <?php echo e(get_rami_active_menu('blackforest-info')); ?>" href="<?php echo e(url('/היער-השחור')); ?>">היער השחור מידע</a>
                  </li>
               <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle <?php echo e(get_rami_active_menu('tourist-info')); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">מידע למטייל</a> 
                  <ul class="dropdown-menu" role="menu">
                     <li class="dropdown-item dropdown">
                        <a href="" class="dropdown-toggle">
                        הולנד</a>
                        <ul class="dropdown-menu">
                           <li class="dropdown-item"><a href="<?php echo e(url('/כפרי-נופש-בהולנד')); ?>">כפרי נופש בהולנד</a></li></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/הולנד-עם-ילדים')); ?>">הולנד עם ילדים</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/כפר-נופש-בהולנד-למשפחות')); ?>">כפר נופש בהולנד למשפחות</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/חבילות-נופש-להולנד')); ?>"> חבילות נופש להולנד</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/חופשה-בהולנד-עם-ילדים')); ?>">חופשה בהולנד עם ילדים</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/חופשה-בהולנד')); ?>">חופשה בהולנד</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/נופש-בהולנד-למשפחות')); ?>">נופש בהולנד למשפחות</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/נופש-בהולנד-עם-ילדים')); ?>">נופש בהולנד עם ילדים</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/לינה-בהולנד-עם-ילדים')); ?>">לינה בהולנד עם ילדים</a></li>
                     </ul> 
                     </li>
                     
                     <li class="dropdown-item dropdown">
                        <a href="" class="dropdown-toggle <?php echo e(get_rami_active_menu('tourist-info')); ?>">היער השחור</a>
                       <ul class="dropdown-menu">
                           <li class="dropdown-item"><a href="<?php echo e(url('/היער-השחור-גרמניה')); ?>">יער השחור גרמניה</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/package-category/דילים-ליער-השחור')); ?>">דילים ליער השחור</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/flights/יסות-ליער-השחור')); ?>">טיסות ליער השחור</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/היער-השחור-עם-ילדים')); ?>">היער השחור עם ילדים</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/טיול-מאורגן-ליער-השחור-למשפחות')); ?>">טיול מאורגן ליער השחור למשפחות</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/טיול-ליער-השחור')); ?>">טיול ליער השחור</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/כפר-נופש-ביער-השחור')); ?>">כפרי נופש ביער השחור</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/חופשה-ביער-השחור')); ?>">חופשה ביער השחור</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/כרטיס-היער-השחור-החדש-schwarzwaldcard')); ?>">כרטיס היער השחור</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/מלונות-מומלצים-ביער-השחור')); ?>">מלונות ביער השחור</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/accomodation/לינה-ביער-השחור')); ?>">אפשרויות לינה ביער השחור</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/צימרים-ודירות-נופש-ביער-השחור')); ?>">צימרים ודירות נופש ביער השחור</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/חוות-ביער-השחור')); ?>">חוות ביער השחור</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/בקתות-ביער-השחור')); ?>">בקתות ביער השחור</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/חבילות-נופש-ליעד-השחור')); ?>">חבילות נופש ליער השחור</a></li>
                        </ul> 
                     </li>
                     <li class="dropdown-item dropdown">
                        <a href="" class="dropdown-toggle <?php echo e(get_rami_active_menu('tourist-info')); ?>">אוסטריה</a>
                       <ul class="dropdown-menu">
                           <li class="dropdown-item"><a href="<?php echo e(url('/טיול-מאורגן-לאוסטריה')); ?>">טיול מאורגן לאוסטריה</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/טיול-באוסטריה')); ?>">טיול באוסטריה</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/כפר-נופש-באוסטריה')); ?>">כפר נופש באוסטריה</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/דילים-לאוסטריה')); ?>">דילים לאוסטריה</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/חבילות-נופש-לאוסטריה')); ?>">חבילות נופש לאוסטריה</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/טיסות-לזלצבורג')); ?>">טיסות לזלצבורג</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/טיול-לאוסטריה-עם-ילדים')); ?>">טיול לאוסטריה עם ילדים</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/אוסטריה-למשפחות')); ?>">אוסטריה למשפחות</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/צימרים-באוסטריה')); ?>">צימרים באוסטריה</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/דירות-נופש-באוסטריה')); ?>">דירות נופש באוסטריה</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/צימרים-בזלצבורג')); ?>">צימרים בזלצבורג</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/דירות-נופש-בזלצבורג')); ?>">דירות נופש בזלצבורג</a></li>                          
                        </ul> 
                     </li>
                     
                     <li class="dropdown-item dropdown">
                        <a href="" class="dropdown-toggle <?php echo e(get_rami_active_menu('tourist-info')); ?>">בריסל</a>
                        <ul class="dropdown-menu">
                           <li class="dropdown-item"><a href="<?php echo e(url('/טיסות-לבריסל')); ?>">טיסות לבריסל</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/טיסות-זולות-לבריסל')); ?>">טיסות זולות לבריסל</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/טיסות-לבריסל-אל-על')); ?>">טיסות לבריסל אל על</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/טיסות-לבריסל-בריסל-איירליינס')); ?>">טיסות לבריסל בריסל איירליינס</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/כרטיס-טיסה-לבריסל')); ?>">כרטיס טיסה לבריסל</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/טיסה-לבלגיה-בריסל')); ?>">טיסה לבלגיה בריסל</a></li>
                           <li class="dropdown-item"><a href="<?php echo e(url('/טיסה-לבריסל-לואו-קוסט')); ?>">טיסה לבריסל לואו קוסט</a></li>
                        </ul> 
                     </li>
                     <li class="dropdown-item dropdown">
                        <a href="" class="dropdown-toggle <?php echo e(get_rami_active_menu('tourist-info')); ?>">כללי</a>
                        <ul class="dropdown-menu">
                           <li class="dropdown-item"><a href="<?php echo e(url('/פארק-אירופה')); ?>">פארק אירופה</a></li>
                        </ul>
                     </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link js-scroll-trigger <?php echo e(get_rami_active_menu('contact')); ?>" href="<?php echo e(url('/contact')); ?>">צור קשר</a>          
                  </li>
                  <?php echo last_header_menu_for_pages(); ?>

               </ul>
            </div>
         </div>
      </nav>
<?php /**PATH /home/eli/ramtours/resources/views/frontend/front_part/nav.blade.php ENDPATH**/ ?>