(function ($) {
    'use strict';

    /**
     * All of the code for your admin-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    $(document).ready(function () {
        console.log('ready');

        function exportToCsv(filename, rows) {
            let processRow = function (row) {
                let finalVal = '';
                for (let j = 0; j < row.length; j++) {
                    let innerValue = row[j] === null ? '' : row[j].toString();
                    if (row[j] instanceof Date) {
                        innerValue = row[j].toLocaleString();
                    }

                    let result = innerValue.replace(/"/g, '""');
                    if (result.search(/("|,|\n)/g) >= 0)
                        result = '"' + result + '"';
                    if (j > 0)
                        finalVal += ',';
                    finalVal += result;
                }
                return finalVal + '\n';
            };

            let csvFile = '';
            for (let i = 0; i < rows.length; i++) {
                csvFile += processRow(rows[i]);
            }

            let blob = new Blob([csvFile], {type: 'text/csv;charset=utf-8;'});
            if (navigator.msSaveBlob) { // IE 10+
                navigator.msSaveBlob(blob, filename);
            } else {
                let link = document.createElement("a");
                if (link.download !== undefined) { // feature detection
                    // Browsers that support HTML5 download attribute
                    let url = URL.createObjectURL(blob);
                    link.setAttribute("href", url);
                    link.setAttribute("download", filename);
                    link.style.visibility = 'hidden';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }
            }
        }

        $("#downloadTemplate").click(function () {
            // 	Is Premium,Exhibitor Name,Logo URL,Banner Logo URL,Country,Stand,Facebook URL,Instagram URL,Twitter URL,Linkedin  URL,Company URL,Company Phone,Address,Gallery Image 1,Gallery Image 2,Gallery Title 1,Gallery Title 2
            let rows = [
                ['Is Premium', 'Description', 'Product Category', 'Exhibitor Name', 'Logo URL', 'Banner Logo URL', 'Country', 'Stand', 'Facebook URL', 'Instagram URL', 'Twitter URL', 'Linkedin  URL', 'Company URL', 'Company Phone', 'Address', 'Gallery Image 1', 'Gallery Image 2', 'Gallery Title 1', 'Gallery Title 2'],
                [1, 'Deskripsi Company', 'IT Support', 'PT Cipta Dua Saudara', 'https://dummyimage.com/600x400/000/fff', 'https://dummyimage.com/600x400/000/fff', 'Indonesian', 'A0001', '#', '#', '#', '#', '#', '628996926184', 'DKI Jakarta', 'https://dummyimage.com/600x400/000/fff', 'https://dummyimage.com/600x400/000/fff', 'Judul 1', 'Judul 2']
            ];
            exportToCsv('template.csv', rows);
        });
    });

})(jQuery);
