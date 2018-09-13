<?php

/**
 * Created by PhpStorm.
 * User: pdolinaj
 * Date: 13/09/18
 * Time: 09:58
 */
namespace api\processing;

class PrisonerService
{
    /**
     * @param json $prisoner
     * @return array
     * @throws \Exception
     */
    public function translateRecord($prisoner)
    {
        $prisonerArray = \GuzzleHttp\json_decode($prisoner, true);

        $data = array();
        if(isset($prisonerArray['cell'])) {
            $data['cell'] = $this->convertBinaryToString($prisonerArray['cell']);
        } else {
            throw new \Exception('Prisoner record does not contain field [cell]');
        }

        if(isset($prisonerArray['block'])) {
            $data['block'] = $this->convertBinaryToString($prisonerArray['block']);
        } else {
            throw new \Exception('Prisoner record does not contain field [block]');
        }
        return $data;
    }

    /**
     * Converts by single characters from BIN to string
     *
     * @param $binary
     * @return string
     */
    private function convertBinaryToString($binary)
    {
        $output = '';
        foreach(explode(' ', $binary) as $binaryChar) {
            $output .= pack('H*', base_convert($binaryChar, 2, 16));
        }
        return $output;
    }
}