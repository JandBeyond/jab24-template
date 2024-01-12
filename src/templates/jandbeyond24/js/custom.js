JCaption = {}

// Only define the ConferencePlus namespace if not defined.
ConferencePlus = window.ConferencePlus || {};

ConferencePlus = {

    nextNomination   : 0,
    area             : {},
    clonedArea       : {},

    addNomination : function() {
        var html = this.clonedArea.html();
        var newhtml = html
            .replace(/nominee/g,'nominee_' + this.nextNomination)
            .replace(/awardcategory_id/g,'awardcategory_id_' + this.nextNomination);

        this.increasenextNominationNumber();

        newhtml = '<div id="nomination' + this.nextNomination + '">' + newhtml + '</div>';
        document.querySelector('.nominationlist').append(newhtml);

      document.querySelector('input[name="nominationcount"]').value(this.nextNomination);

    },

    relaceId : function(){
        var html = this.clonedArea.html();
        newhtml = html
            .replace('nominee','nominee_' + this.nextNomination,'gm')
            .replace('awardcategory_id','awardcategory_id_' + this.nextNomination,'gm');

        return newhtml;
    },

    setnextNominationNumber : function() {
        this.nextNomination = parseInt(document.querySelector('input[name="nominationcount"]').value());
    },

    increasenextNominationNumber : function() {
        this.nextNomination++;
    },

    setArea : function() {
        this.setnextNominationNumber();
        this.area = document.getElementById('#nomination0');
        this.prepareClone();
    },

    prepareClone : function() {
        this.clonedArea = this.area.clone();
    }
};
