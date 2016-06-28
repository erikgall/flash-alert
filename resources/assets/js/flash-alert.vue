<template>

    <div class="alert-wrapper">
        <div v-show="show"
             class="alert alert-fixed alert-dismissible animated slideInDown"
             :class="[css, { in: show}]"
             @click="hide()"
             role="alert">

            <div class="icon col-xs-1">
                <div class="icon-wrapper">
                    <i class="fa fa-bell-o animated swing"></i>
                </div>
            </div>

            <div class="message col-xs-11 text-md-center">
                <strong>{{ messageTitle }}</strong> {{ message }}
            </div>
        </div>
    </div>

</template>
<script>
    export default {

        computed: {

            css() {

                if (this.type.length) {
                    return this.defaults[this.type].css;
                }

                return 'alert-success';
            },
            messageTitle() {

                if (this.title != '') {
                    return this.title;
                } else if (this.type) {
                    return this.defaults[this.type].title;
                }

                return '';

            }

        },

        data() {
            return {
                defaults: {
                    danger: {
                        css: 'alert-danger',
                        title: 'Error!',
                    },
                    error: {
                        css: 'alert-danger',
                        title: 'Error!'
                    },
                    info: {
                        css: 'alert-info',
                        title: 'Info:'
                    },
                    success: {
                        css: 'alert-success',
                        title: 'Success!'
                    },
                    warning: {
                        css: 'alert-warning',
                        title: 'Warning!'
                    },
                }
            }
        },
        methods: {

            hide() {

                this.show = false;
                this.title = '';
                this.message = '';
                this.type = '';

            },

            timerCallback($this) {
                return function () {
                    $this.hide();
                };
            },

            show() {

                this.show = true;

            },

            startTimer() {
                setTimeout(this.timerCallback(this), this.autohide);
            }
        },

        props: {

            autohide: {
                default: 0,
                type: Number,
            },

            message: {
                default: '',
                type: String,
            },

            title: {
                default: '',
                type: String,
            },

            show: {
                default: false,
                type: Boolean,
            },

            type: {
                default: '',
                type: String,
            },

        },

        ready() {

            if (this.show == true && this.autohide > 0) {

                this.startTimer();

            }
        }

    }
</script>