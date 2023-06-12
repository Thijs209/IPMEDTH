<script lang="ts">
</script>

<section class="evaluate-pop">
    <!-- This is the main contain -->
    <section class="evaluate-pop__profile">
        <slot class="evaluate-pop__profile" name="evaluate-pop-profile" />
    </section>
    <!-- The dark green profile sidebar. Width = 1fr. -->
    <section class="evaluate-pop__main">
        <nav class="evaluate_pop__tabs">
            <slot class="evaluate-pop__tabs" name="evaluate-pop-tabs" />
        </nav>
        <section class="evaluate-pop__content">
            <slot name="evaluate-pop-content" />
        </section>
        <!-- The main content, e.g. corequadrants. Width =  2fr (i.e. 50% of available width). -->
        <section class="evaluate-pop__notes">
            <slot name="evaluate-pop-notes" />
        </section>
        <!-- The righthand notes section. Width = 1fr. height = 1fr - 10rem -->
        <div class="evaluate-pop__buttons">
            <slot name="evaluate-pop-buttons" />
        </div>
        <!-- The bottomright button section. height: 10rem; width: 0.2fr, aligned to right end. -->
    </section>
</section>

<style>
    /* Main Container, leftside => green profile, rightside => content */
    .evaluate-pop {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 100%;
        background-color: #eee;
        min-height: 80vh; /* TODO test if setting height w/ vh height leads to issues. */
        border-radius: 1rem;
    }

    /* Darkgreen profile */
    .evaluate-pop__profile {
        width: 15%;
        min-height: 100%;
    }

    /* Main content window, contains the nav tabs, POP pages, and permanent notes section. Bottomright contains action buttons. */
    .evaluate-pop__main {
        display: grid;
        grid-template-columns: 1fr 2fr 1fr;
        grid-template-rows: 1fr 5rem;

        height: 100%;
        min-height: 80vh; /* TODO test if setting height w/ vh leads to issues. */
        width: 85%;
        min-width: 80%;
        border-top-right-radius: 1rem;
        border-bottom-right-radius: 1rem;
    }

    .evaluate-pop__notes {
        grid-column: 3 / span 1;
    }

    .evaluate-pop__buttons {
        display: flex;
        width: 100%;
        height: 100%;
        grid-column: 3 / span 1;
        grid-row: 3 / span 1;
        background-color: black;
    }
</style>
