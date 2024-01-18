document.addEventListener('DOMContentLoaded', contextMenu, false);
document.addEventListener('DOMContentLoaded', hamburgerMenu, false);
document.addEventListener('DOMContentLoaded', searchSetup, false);
document.addEventListener('DOMContentLoaded', bannerLoader, false);
document.addEventListener('DOMContentLoaded', covidSetup, false);
document.addEventListener('DOMContentLoaded', sliderSetup, false);
document.addEventListener('DOMContentLoaded', schoolMintConnectSetup, false);

function sliderSetup() {
   const tracks = document.getElementsByClassName('home-slider-track');
   for (let track of tracks) {
      const time = Number(track.getAttribute('data-time'));
      const itemCount = track.getElementsByClassName('home-slider-item').length;
      const leftButton = track.parentElement.querySelector('.home-slider-button-left');
      const rightButton = track.parentElement.querySelector('.home-slider-button-right');
      let i = 0;
      let freeze = false;
      updateButtons();
      setInterval(() => {
         if (!freeze) {
            slide(1);
         }
      }, time);
      if (leftButton) {
         leftButton.addEventListener('click', () => {
            slide(-1);
            freeze = true;
         });
      }
      if (rightButton) {
         rightButton.addEventListener('click', () => {
            slide(1);
            freeze = true;
         });
      }
      function slide(direction) {
         i += direction;
         if (i >= itemCount) {
            i = 0;
         }
         if (i < 0) {
            i = itemCount - 1;
         }
         track.style.transform = `translateX(-${i * 100}%)`;
         updateButtons();
      }
      function updateButtons() {
         if (leftButton) {
            leftButton.disabled = i === 0;
         }
         if (rightButton) {
            rightButton.disabled = i === itemCount - 1;
         }
      }
   }
}

function covidSetup() {
   var closeButtons = document.getElementsByClassName('header-covid-close');
   if (closeButtons.length) {
      closeButtons[0].addEventListener('click', function(event) {
         var wrapper = document.getElementsByClassName('main-masthead-wrapper')[0];
         var banner = document.getElementsByClassName('header-covid-banner')[0];
         banner.style.display = 'none';
         wrapper.classList.remove('has-notice');
      });
   }
}

function bannerLoader() {
   
   var loaders = document.getElementsByClassName('home-banner-loader');
   
   for (var i = 0; i < loaders.length; i++) {
      setUpLoader(i);
   }
   
   function setUpLoader(index) {
      var loader = loaders[index];
      loader.onload = function() { 
         loader.classList.add('loaded');
         loader.parentElement.querySelector('.home-banner-placeholder').style.display = 'none';
      };
      var src = loader.getAttribute('data-src-large');
      if (screen.width >= 768) {
         src = loader.getAttribute('data-src-full');
      }
      // must set src after registering onload, or else onload won't fire if the image is cached
      loader.setAttribute('src', src);
   }
}

function searchSetup() {
   
   var isActivated = false;
   
   var searchActivatorId = 'search-activator';
   var searchAreaId = 'search-area';
   var searchInputId = 's';
   
   var searchActivator = document.getElementById(searchActivatorId);
   var searchArea = document.getElementById(searchAreaId);
   var searchInput = document.getElementById(searchInputId);
   
   searchActivator.addEventListener('click', function(event) {
      isActivated = !isActivated;
      searchArea.classList.toggle('visible');
      searchInput.focus();
      event.preventDefault();
   });
}

function hamburgerMenu() {

   var isMenuExpanded = false;
   
   var hamburgerId = 'hamburger';
   var mainMenuId = 'main-menu';
   var menuItemClassName = 'has-children';

   var hamburger = document.getElementById(hamburgerId);
   var mainMenu = document.getElementById(mainMenuId);
   var menuItems = mainMenu.getElementsByClassName(menuItemClassName);

   function collapseMenu() {
      isMenuExpanded = false;
      mainMenu.classList.remove('visible');
      for (var i = 0; i < menuItems.length; i++) {
         var menuItem = menuItems[i];
         menuItem.classList.remove('expanded');
      }
   }

   function hasAncestorWithId(el, id) {
      while (el) {
         if (el.id === id) return true;
         el = el.parentElement;
      }
      return false;
   }

   window.onresize = function() {
      collapseMenu();
   };

   document.addEventListener('click', function(event) {
      if (isMenuExpanded) {
         var isClickInsideMenu = !!hasAncestorWithId(event.target, mainMenuId);
         if (!isClickInsideMenu) {
            var isClickInsideButton = !!hasAncestorWithId(event.target, hamburgerId);
            if (!isClickInsideButton) collapseMenu();
         }
      }
   });

   hamburger.addEventListener('click', function(event) {
      isMenuExpanded = !isMenuExpanded;
      mainMenu.classList.toggle('visible');
      event.preventDefault();
   });

   for (var i = 0; i < menuItems.length; i++) {
      var menuItem = menuItems[i];
      registerMenuItemExpandEvent(menuItem);
   }

   function registerMenuItemExpandEvent(menuItem) {
      var link = menuItem.getElementsByTagName('a')[0];
      var subList = menuItem.getElementsByTagName('ul')[0];
      link.addEventListener('click', function(e) {
         // if this is not in the hamburger menu or there are no sub-menu-items,
         // we just want to follow the link like normal
         if (!isMenuExpanded || !subList) return true;
         menuItem.classList.toggle('expanded');
         e.preventDefault();
         return false;
      });
   }
}

function contextMenu() {
   
   var menuItems = document.getElementsByClassName('header-menu-item has-children');
   var subMenuItems = document.getElementsByClassName('header-context-menu-item has-children');
   
   for (var i = 0; i < menuItems.length; i++) {
      registerEvents(menuItems[i], function() {
         closeAllContextMenus(menuItems);
      });
   }
   
   for (var i = 0; i < subMenuItems.length; i++) {
      registerEvents(subMenuItems[i], function() {
         closeAllContextMenus(subMenuItems);
      });
   }

   function closeAllContextMenus(menuItems) {
      for (var i = 0; i < menuItems.length; i++) {
         var contextMenu = getContextMenu(menuItems[i]);
         if (contextMenu) {
            contextMenu.classList.remove('visible');
         }
      }
   }

   function registerEvents(menuItem, closeAllContextMenusCallback) {
      var contextMenu = getContextMenu(menuItem);
      if (contextMenu) {
         var isClosing = false;
         var hasPositionedSecondLevel = false;
         menuItem.addEventListener('mouseover', function() {
            closeAllContextMenusCallback();
            isClosing = false;
            contextMenu.classList.add('visible');
            if (!hasPositionedSecondLevel) {
               hasPositionedSecondLevel = true;
               positionSecondLevelContextMenus(contextMenu);
            }
         });
         menuItem.addEventListener('mouseleave', function() {
            isClosing = true;
            setTimeout(function() {
               if (isClosing) {
                  contextMenu.classList.remove('visible');
               }
            }, 50);
         });
         menuItem.addEventListener('click', function() {
            closeAllContextMenus(menuItems);
            closeAllContextMenus(subMenuItems);
         });
      }
   }
   
   function positionSecondLevelContextMenus(contextMenu) {
      var items = contextMenu.children;
      for (var i = 0; i < items.length; i++) {
         var item = items[i];
         var secondContextMenu = getContextMenu(item);
         if (secondContextMenu) {
            var positionInfo = item.getBoundingClientRect();
            secondContextMenu.style.left = positionInfo.width + 'px';
            secondContextMenu.style.top = '-1px';
         }
      }
   }

   function getContextMenu(menuItem) {
      return menuItem.children && menuItem.children.length > 1 ? menuItem.children[1] : null;
   }

}

function schoolMintConnectSetup() {
   var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
   script.src = 'https://connect.schoolmint.com/api/noAuth/widget/getWidgetScriptForSchool/d407b6a71f4241f4af25faf20dbedd23';
   tag.parentNode.insertBefore(script, tag);
   script.onerror= function() {
       etWidgetDivs = document.getElementsByClassName('et-widget');
       var testDivs = Array.prototype.filter.call(etWidgetDivs, function(etWidgetDiv) {
           etWidgetDiv.innerHTML = '<p><span style="color:red">We are sorry for the inconvenience, but our forms are currently undergoing maintenance. Please check back again shortly.</span></p>';
       });
   }
}