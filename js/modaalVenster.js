var modaalVenObject = (function() {
    var $window = $(window);
    var $modaalVenster = $('<div class="modaal-venster"/>');
    var $modaalInhoud = $('<div class="modaal-inhoud"/>');
    var $sluitKnop = $('<span class="sluit-knop">&#10005;</span>');
    
    $modaalVenster.append($modaalInhoud);
    
    return {
        centreren: function(){
            // opdrachten centreren
            var links = Math.max($window.width()-$modaalInhoud.outerWidth(), 0) / 2;
            var boven = Math.max($window.height()-$modaalInhoud.outerHeight(), 0) / 2;
            $modaalInhoud.css({left: links, top: boven});
        },
        openen: function(instellingen){
            // opdrachten openen
            $modaalInhoud.append(instellingen.inhoud, $sluitKnop);
            $modaalInhoud.css({width: instellingen.breedte+'px'|| 'auto',
                               height: instellingen.hoogte+'px' || 'auto'})
                .on('click', function(e) {
                    e.stopPropagation();
            });
            $modaalVenster.appendTo('body')
                .on('click', modaalVenObject.sluiten);
            modaalVenObject.centreren();
            $sluitKnop.on('click', modaalVenObject.sluiten);
            $window.on('resize', modaalVenObject.centreren);
        },
        sluiten: function(){
            // opdrachten sluiten
            $modaalInhoud.empty()
                .off('click', modaalVenObject.sluiten);;
            $modaalVenster.detach();
            $window.off('resize', modaalVenObject.centreren);
        }
    }
}());