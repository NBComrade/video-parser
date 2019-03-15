var Video = {

    data: null,

    videoNameElement: $('.video-content .video-content-name'),
    videoAuthorElement: $('.video-content .video-content-author'),
    videoPreviewImage: $('.video-content .video-content-preview'),
    videoFrame: $('.video-content .video-content-frame'),


    getDataByAjax: function (params) {
        var self = this;

        $.ajax({
            type: 'POST',
            url: '/parse',
            data: params,
        }).done(function (data) {
            self.data = $.parseJSON(data);
            self.hideFrame();
            self.renderData()

        }).fail(function (data) {
            alert(data.responseJSON.message);
        });
    },

    renderData: function () {

        this.videoAuthorElement.text(this.data.author_name);
        this.videoNameElement.text(this.data.title);
        this.videoPreviewImage.attr('src', this.data.thumbnail_url);

        this.showVideoContent();
    },

    showVideoContent: function () {
        $('.video-content').show();
    },

    showFrame: function () {
        this.videoPreviewImage.hide();
        this.videoFrame.html(this.data.html);
    },

    hideFrame: function () {
        this.videoPreviewImage.show();
        this.videoFrame.html('');
    }
};

$(document)
    .on('submit', '#parseForm', function (event) {
        var form = $(event.currentTarget);
        Video.getDataByAjax(form.serialize());
        event.preventDefault();
    })
    .on('click', '.video-content .video-content-preview', function (event) {
        Video.showFrame();
    });
