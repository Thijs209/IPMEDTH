<script lang="ts">
</script>

<section class="evaluate-pop">
    <!-- This is the main contain -->
    <section class="evaluate-pop__profile">
        <slot class="evaluate-pop__profile" name="evaluate-pop-profile" />
    </section>
    <!-- The dark green profile sidebar. Width = 1fr. -->
    <section class="evaluate-pop__main">
        <div class="evaluate-pop__tabs">
            <slot class="evaluate-pop__tabs" name="evaluate-pop-tabs" />
        </div>
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
        max-width: 90vw;
        background-color: #eee;
        min-height: 85vh; /* m TODO test if setting height w/ vh height leads to issues. */
        border-radius: 1rem;
    }

    /* Darkgreen profile */
    .evaluate-pop__profile {
        width: clamp(15rem, 15vw, 20rem);
    }

    /* Main content window, contains the nav tabs, POP pages, and permanent notes section. Bottomright contains action buttons. */
    .evaluate-pop__main {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 5rem 1fr 10rem;
        align-items: start;
        justify-items: start;
        margin: 0 auto;
        padding: 2rem;
        width: 100%;
        border-top-right-radius: 1rem;
        border-bottom-right-radius: 1rem;
    }

    .evaluate-pop__content {
        margin-top: 2rem;
        grid-column: 1 / span 2;
        grid-row: 2 / 4;
    }

    .evaluate-pop__notes {
        margin-top: 2rem;
        grid-column: 3 / span 1;
        grid-row: 2 / span 2;
        height: 80%;
        width: 100%;
        max-height: 80%;
    }

    /* Navigation and interaction */

    .evaluate-pop__tabs {
        grid-column: 1 / span all;
        grid-row: 1 / 2;
        background-color: #eee;
        width: 100%;
        padding-bottom: 2rem;
    }

    .evaluate-pop__buttons {
        display: flex;
        flex-flow: row wrap;
        justify-content: flex-end;
        align-items: center;
        width: 100%;
        height: 100%;
        min-height: 7rem;
        grid-column: 3 / span 1;
        grid-row: 3 / 4;
        align-self: end;
    }
</style>
