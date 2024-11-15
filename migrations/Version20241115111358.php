<?php

declare(strict_types=1);

namespace App;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Migration changes the Variant selection method for the product with a slug 'ethereal-drift-t-shirt' to 'Variant choice'
 */
final class Version20241115111358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Change variant_selection_method for the product';
    }

    public function up(Schema $schema): void
    {
        $this->skipIf(
            !$schema->hasTable('sylius_product'),
            'Skipping because `sylius_product` schema does not exists'
        );
        $this->addSql('UPDATE sylius_product SET variant_selection_method = "choice" WHERE code = "Ethereal_Drift_T_Shirt";');
    }

    public function down(Schema $schema): void
    {
        $this->skipIf(
            !$schema->hasTable('sylius_product'),
            'Skipping because `sylius_product` schema does not exists'
        );
        $this->addSql('UPDATE sylius_product SET variant_selection_method = "match" WHERE code = "Ethereal_Drift_T_Shirt";');
    }
}
