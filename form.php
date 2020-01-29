<div class="hcf_box">
    <style>
        .hcf_field{
            display: flex;
            flex-direction: column;
            font-family: 'Times New Roman', Times, serif;
        }
        .meta-options label {
            font-weight: bold;
            font-size: 16px;
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
    <p class="meta-options hcf_field">
        <label for="sub_section">Upper Section</label>
        <!-- <textarea id="sub_section"
            type="text"
            name="sub_section"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'show_link', true ) ); ?>"> -->
            <textarea name="sub_section" id="sub_section" cols="30" rows="10"><?php echo esc_attr( get_post_meta( get_the_ID(), 'sub_section', true)); ?></textarea>
    </p>
</div>