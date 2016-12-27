document.addEventListener('DOMContentLoaded', main, false);

function main() {
   var menuItems = document.getElementsByClassName('menu-item has-children');
   for (var i = 0; i < menuItems.length; i++) {
      registerEvents(menuItems[i], function() { closeAllContextMenus(menuItems) });
   }
}

function closeAllContextMenus(menuItems) {
   for (var i = 0; i < menuItems.length; i++) {
      var contextMenu = getContextMenu(menuItems[i]);
      if (contextMenu) {
         contextMenu.style.display = 'none';
      }
   }
}

function registerEvents(menuItem, closeAllContextMenusCallback) {
   var contextMenu = getContextMenu(menuItem);
   if (contextMenu) {
      var isClosing = false;
      menuItem.addEventListener('mouseover', function() {
         closeAllContextMenusCallback();
         isClosing = false;
         contextMenu.style.display = 'block';
      });
      menuItem.addEventListener('mouseleave', function() {
         isClosing = true;
         setTimeout(function() {
            if (isClosing) {
               contextMenu.style.display = 'none';
            }
         }, 150);
      });
   }
}

function getContextMenu(menuItem) {
   var contextMenus = menuItem.getElementsByClassName('context-menu');
   return contextMenus.length ? contextMenus[0] : null;
}
