export default class SeoForm {
    $form;

    constructor() {
        this.$form = $('.seo-form');
        if (this.$form.length === 0) return false;

        $('[data-seo-title]').keyup(e => this.set('title', e))
        $('[data-seo-description]').keyup(e => this.set('description', e))
        $('[data-seo-slug]').keyup(e => this.setSlug(e))
    }

    set(key, e) {
        let value = $(e.currentTarget).val();
        this.$form.find('[id="seo.' + key + '"]').val(value)
    }

    setSlug(e) {
        let value = $(e.currentTarget).val();
        this.$form.find('[id="seo.slug"]').val(slug(value))
    }
}
