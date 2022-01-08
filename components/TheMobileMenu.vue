<template>
    <div ref="mobilenav" class="relative lg:hidden">
        <button id="nav-btn" ref="mobilebtn" class="nav-toggle" :class="{'block': isOpen}" aria-label="Toggle Navigation" aria-controls="nav-mobile" @click.prevent="toggle()">
            <span>X</span>
        </button>

        <div v-if="isOpen" id="nav-mobile" ref="mobilePanel" class="block" :aria-hidden="isOpen ? 'false' : 'true'" aria-modal="true">
            <div>
                <ul>
                    <li>item a</li>
                    <li>item b</li>
                    <li>item c</li>
                </ul>

                <br>

                <a href="#" class="" @click.prevent="close">Close</a>
            </div>
        </div>
    </div>
</template>

<script>
    import { focusFirst, focusTrap } from '../mixins'

    export default {
        mixins: [focusTrap, focusFirst],

        data() {
            return {
                isOpen: false,
            }
        },

        watch: {
            $route(to, from) {
                this.close()
            }
        },

        methods: {
            toggle() {
                if (this.isOpen) {
                    this.close()
                } else {
                    this.open()
                }
            },

            open() {
                this.isOpen = true
                this.disableScroll()
                this.$emit('open-nav')

                setTimeout(() => {
                    this.focusTrap(this.$refs.mobilePanel)
                    this.focusFirst(this.$refs.mobilePanel)
                }, 200)
            },

            close() {
                this.isOpen = false
                this.enableScroll()
                this.$emit('close-nav')
                this.$refs.mobilebtn.focus()
            },

            enableScroll() {
                document.body.style.overflow = ''
                document.body.style.paddingRight = ''
            },

            disableScroll() {
                document.body.style.overflow = 'hidden'
                document.body.style.paddingRight = '0px'
            }
        },

        mounted() {
            const escape = (event) => {
                if (event.defaultPrevented) return

                switch (event.key) {
                    case 'Esc':
                    case 'Escape':
                        this.close()
                        break
                    default:
                        return
                }

                event.preventDefault()
            }

            document.addEventListener('keyup', escape)

            this.$on('hook:destroyed', () => {
                document.removeEventListener('keyup', escape)
                this.enableScroll()
            })
        },
    }
</script>