<h2><?php esc_html_e('Key details', 'lmfwc');?></h2>
<hr class="wp-header-end">

<?php if ($key_data): ?>

    <form method="post" action="<?=admin_url('admin-post.php');?>">
        <?php wp_nonce_field('lmfwc-api-key-update'); ?>

        <table class="form-table">
            <tbody>
                <tr scope="row">
                    <th scope="row">
                        <label for="consumer_key"><?php esc_html_e('Consumer key', 'lmfwc');?></label>
                    </th>
                    <td>
                        <input
                            id="consumer_key"
                            class="regular-text"
                            name="consumer_key"
                            type="text"
                            value="<?php echo esc_attr($key_data['consumer_key']); ?>"
                            readonly="readonly"
                        >
                    </td>
                </tr>
                <tr scope="row">
                    <th scope="row">
                        <label for="consumer_secret"><?php esc_html_e('Consumer secret', 'lmfwc');?></label>
                    </th>
                    <td>
                        <input
                            id="consumer_secret"
                            class="regular-text"
                            name="consumer_secret"
                            type="text"
                            value="<?php echo esc_attr($key_data['consumer_secret']); ?>"
                            readonly="readonly"
                        >
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="submit">
            <a
                style="color: #a00; text-decoration: none; margin-left: 10px;"
                href="<?php echo esc_url(
                    wp_nonce_url(
                        add_query_arg(
                            array(
                                'action' => 'revoke',
                                'key' => $key_data['key_id']
                            ),
                            sprintf(admin_url('admin.php?page=%s&tab=rest_api'), \LicenseManagerForWooCommerce\AdminMenus::SETTINGS_PAGE)
                        ),
                        'revoke'
                    )
                );?>"
            >
                <span><?php esc_html_e('Revoke key', 'lmfwc'); ?></span>
            </a>
        </p>
    </form>

<?php else: ?>

    <div><?php esc_html_e('Nothing to see here...', 'lmfwc'); ?></div>

<?php endif; ?>