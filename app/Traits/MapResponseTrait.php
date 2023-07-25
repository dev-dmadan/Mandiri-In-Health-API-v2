<?php

namespace App\Traits;

use Carbon\Carbon;

trait MapResponseTrait 
{
    public function bindingColumnWithValue($item)
    {
        $column = [];

        foreach ($this->getAllColumnType() as $type => $columnList) {
            if($type == 'guid') {
                foreach ($columnList as $key => $value) {
                    $splitType = explode('|', $value);
                    $lookupProp = $this->getLookupProperty($key);
                    $column[$lookupProp] = $this->getGuidColumnValue($item, $lookupProp, count($splitType) > 1 ? $splitType[1] : null);;
                }

                continue;
            }

            if($type == 'string') {
                foreach ($columnList as $key => $value) {
                    $splitType = explode('|', $value);
                    $column[$key] = $this->getStringColumnValue($item->{$key}, count($splitType) > 1 ? $splitType[1] : null);
                }

                continue;
            }

            if($type == 'float') {
                foreach ($columnList as $key => $value) {
                    $splitType = explode('|', $value);
                    $column[$key] = $this->getFloatColumnValue($item->{$key}, count($splitType) > 1 ? $splitType[1] : null);
                }

                continue;
            }

            if($type == 'int') {
                foreach ($columnList as $key => $value) {
                    $column[$key] = (string)$item->{$key};
                }

                continue;
            }

            if($type == 'boolean') {
                foreach ($columnList as $key => $value) {
                    $column[$key] = (bool)$item->{$key};
                }
                
                continue;
            }

            if($type == 'datetime') {
                foreach ($columnList as $key => $value) {
                    $column[$key] = $this->getDateTimeColumnValue($item->{$key});                    
                }

                continue;
            }
        }

        return $column;
    }

    public function stringEmpty()
    {
        return "-";
    }

    public function floatEmpty($type = null)
    {
        if($type == 'money') return 'IDR 0.00';
        
        if($type == 'percent') return '0.00 %';

        return '0.00';
    }

    public function getAllColumnType()
    {
        return [
            'guid' => $this->getGuidColumn(),
            'string' => $this->getStringColumn(),
            'float' => $this->getFloatColumn(),
            'int' => $this->getIntColumn(),
            'boolean' => $this->getBoolColumn(),
            'datetime' => $this->getDateTimeColumn()
        ];
    }

    public function getGuidColumn()
    {
        return array_filter($this->column(), function($value, $key) {
            $isExists = array_search('guid', explode('|', $value));
            return $isExists === false ? false : true;
        }, ARRAY_FILTER_USE_BOTH);
    }

    public function getGuidColumnValue($item, $lookupProperty, $option = null)
    {
        if($option == 'primary') {
            return $item->{$lookupProperty};
        }

        $value = !empty($item->{$lookupProperty}) ? $item->{$lookupProperty}->getDisplayValue() : $this->stringEmpty();
        return $this->getStringColumnValue(
            value: $value,
            option: $option
        );
    }

    public function getLookupProperty($column) 
    {
        if($column == 'Id') {
            return 'Id';
        }

        $prefix = substr($column, 0, 3);
        return $prefix == 'Mdr' ? substr($column, 3, -2) : substr($column, 0, -2);
    }
    
    public function getStringColumn()
    {
        return array_filter($this->column(), function($value, $key) {
            $isExists = array_search('string', explode('|', $value));
            return $isExists === false ? false : true;
        }, ARRAY_FILTER_USE_BOTH);
    }
    
    public function getStringColumnValue($value, $option = null)
    {
        if(empty($value)) {
            return $this->stringEmpty();
        }

        if($option == 'uppercase') {
            return strtoupper($value);
        }

        if($option == 'lowercase') {
            return strtolower($value);
        }

        return $value;
    }

    public function getFloatColumn()
    {
        return array_filter($this->column(), function($value, $key) {
            $isExists = array_search('float', explode('|', $value));
            return $isExists === false ? false : true;
        }, ARRAY_FILTER_USE_BOTH);
    }

    public function getFloatColumnValue($value, $option = null)
    {
        if($option == 'percent') {
            return number_format((float)$value, 2).' %';
        }

        if(str_contains($option, 'money')) {
            if(str_contains($option, 'short')) {
                $pembagi = 1;
                $akhiran = "";
                if((float)$value >= 1000000000000) {
                    $pembagi = 1000000000000;
                    $akhiran = " T";
                } else if((float)$value >= 1000000000) {
                    $pembagi = 1000000000;
                    $akhiran = " M";
                } else if((float)$value >= 1000000) {
                    $pembagi = 1000000;
                    $akhiran = " JT";
                } else if((float)$value >= 1000) {
                    $pembagi = 1000;
                    $akhiran = " RB";
                }

                return 'IDR '.number_format((float)$value/$pembagi).$akhiran;
            }

            return 'IDR '.number_format((float)$value, 2);
        }

        return number_format((float)$value, 2);
    }

    public function getIntColumn()
    {
        return array_filter($this->column(), function($value, $key) {
            return $value == 'integer' || $value == 'int';
        }, ARRAY_FILTER_USE_BOTH);
    }

    public function getBoolColumn()
    {
        return array_filter($this->column(), function($value, $key) {
            return $value == 'boolean' || $value == 'bool';
        }, ARRAY_FILTER_USE_BOTH);
    }

    public function getDateTimeColumn()
    {
        return array_filter($this->column(), function($value, $key) {
            $isExists = array_search('datetime', explode('|', $value));
            return $isExists === false ? false : true;
        }, ARRAY_FILTER_USE_BOTH);
    }

    public function getDateTimeColumnValue($value, $option = null)
    {
        return Carbon::parse($value, 'UTC')
            ->setTimezone('Asia/Jakarta')
            ->format('d-m-Y');
    }
}