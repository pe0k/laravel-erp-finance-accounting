<?php
namespace PERLUR\ERP\Finance\Accounting;

class ChartOfAccountsTemplate
{
    public function importXmlTemplate($xml_uri, $model_klass, array $config)
    {
        $skipped = 0;
        $inserted = 0;
        
        $doc = new \DOMDocument();
        $reader = new \XMLReader();

        $record_tag = $config['record_tag'];
        $field_tag = $config['field_tag'];
        $mapping = $config['field_mapping'];

        if (!$reader->open($xml_uri)) {
            throw new \InvalidArgumentException("File '{$xml_uri}' not found.");
        }

        while ($reader->read()) {
            if ($reader->nodeType === \XMLReader::ELEMENT &&
                $reader->name === $record_tag) {
                $node = simplexml_import_dom(
                    $doc->importNode($reader->expand(), true)
                );
                $fields = $node->xpath($field_tag);
                $new_model = $this->newModel($model_klass, $mapping, $fields);
                if ($model_klass::find($new_model->id)) {
                    $skipped++;
                    continue;
                }

                $new_model->save();
                $inserted++;
            }
        }

        return [ 'skipped' => $skipped, 'inserted' => $inserted ];
    }

    protected function newModel($klass, $mapping, $fields)
    {
        $model = new $klass();
        foreach ($fields as $field) {
            $field_name = (string) $field['name'];
            
            if (isset($mapping[$field_name])) {
                $val = (string) $field;
                if (isset($field['ref'])) {
                    $val = (string) $field['ref'];
                }

                $model->{$mapping[$field_name]} = $val;
            }
        }
        
        return $model;
    }

}
