/* BEGIN link helper */
/**
 * Converts elements with data-href attribute into clickable links.
 * Add `data-external-link="true"` to open in new window.
 */
(function ($) {
    let LinkHelper = {
        config: {
            dataAttributeTarget: 'data-href',
            dataExternalLinkTarget: 'data-external-link'
        },

        /**
         *
         * @returns {boolean}
         */
        verifyRequirements: function () {
            let self = this;
            if (!$) {
                console.warn('jQuery not found');
                return false;
            }

            return true;
        },

        init: function (options) {
            let self = this;
            if (! self.verifyRequirements()) {
                return false;
            }
            $.extend(this.config, options);
            $(document).ready(function () {
                self.attachLinkHelperClickEvent();
            });
        },

        /**
         * Attach click event to elements that match data attribute.
         *
         * Ex: <div data-href="/">Home</div>
         *
         * @returns {*}
         */
        attachLinkHelperClickEvent: function () {
            let self = this;
            // For clarity: $('[data-href]')
            $(`[${self.config.dataAttributeTarget}]`)
                .css('cursor', 'pointer')
                .bind('click', function (e) {
                    if ($(this).attr(self.config.dataExternalLinkTarget) === 'true') {
                        e.preventDefault();
                        window.open(
                            $(this).attr(self.config.dataExternalLinkTarget),
                            '_blank'
                        );
                    } else {
                        window.location.href = $(this).attr(self.config.dataExternalLinkTarget);
                    }
                });

            return self;
        }
    }.init();

    // Interface for external access to LinkHelper object
    return {
        initUI: function () {
            if(! LinkHelper.verifyRequirements()) {
                return false;
            }
            LinkHelper.attachLinkHelperClickEvent();
        }
    }
})(jQuery || false);
/* END link helper */