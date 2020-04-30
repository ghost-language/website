<template>
  <article>
    <h3>
      <g-link :to="link">
        <component :is="icon"></component>
        {{ text }}
      </g-link>
    </h3>
  </article>
</template>

<script>
import { SunriseIcon, TruckIcon, ListIcon } from 'vue-feather-icons'

export default {
  components: {
    SunriseIcon,
    TruckIcon,
    ListIcon
  },
  props: {
    link: {
      type: String,
      required: true
    },
    text: {
      type: String,
      required: true
    },
    icon: {
      type: String,
      required: true
    }
  }
}
</script>

<style lang="scss" scoped>
article {
    flex: 1 0;
    border: 1px solid shade($sidebarBright, 2%);
    margin: 0 0 1em;
    background: $sidebarBright;
    padding: 2rem;
    border-radius: 3px;
    transition: background .15s ease-in-out, border-color .15s ease-in-out;

    @include respond-above(sm) {
      margin: 0 1em 0;
    }

    .dark & {
      border: 1px solid $sidebarDark;
      background: $sidebarDark;
    }
  }

a {
  color: inherit;
  text-decoration: none;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  font-size: 1.4em;
}

svg {
  width: 2em;
  height: 2em;
  margin-bottom: 1em;

  @include respond-above(md) {
    width: 3em;
    height: 3em;
  }
}
</style>