<?php

namespace Shishaoqi\MeituanFlashPurchase\Request;

class Shipping extends BaseRequest
{
    /**
     * 创建或更新门店配送范围.
     *
     * @param array $params
     * @return string
     */
    public function save(array $params)
    {
        return $this->post('shipping/save', $params);
    }

    /**
     * 获取门店配送范围自配送
     *
     * @param array $params
     * @return string
     */
    public function lshippingList(array $params)
    {
        return $this->get('shipping/list', $params);
    }

    /**
     * 批量创建或更新配送范围.
     *
     * @param array $params
     * @return string
     */
    public function batchsave(array $params)
    {
        return $this->post('shipping/batchsave', $params);
    }

    /**
     * 获取门店配送范围混合送
     *
     * @param array $params
     * @return string
     */
    public function fetch(array $params)
    {
        return $this->get('shipping/fetch', $params);
    }

    /**
     * 删除配送范围.
     *
     * @param array $params
     * @return string
     */
    public function delete(array $params)
    {
        return $this->post('shipping/delete', $params);
    }

    /**
     * 新增或更新特殊时段配送范围.
     *
     * @param array $params
     * @return string
     */
    public function specSave(array $params)
    {
        return $this->post('shipping/spec/save', $params);
    }

    /**
     * 查询门店配送范围（企客专用）.
     *
     * @param array $params
     * @return mixed
     */
    public function corporateList(array $params)
    {
        return $this->get('shipping/corporate/list', $params);
    }

    /**
     * 批量创建/更新门店配送范围（企客专用）.
     *
     * @param array $params
     * @return mixed
     */
    public function corporateBatchSave(array $params)
    {
        return $this->post('shipping/corporate/batchsave', $params);
    }

    /**
     * 重置门店配送范围（自配）.
     *
     * @param array $params
     * @return mixed
     */
    public function resetSelfDeliveryArea(array $params)
    {
        return $this->post('shipping/resetSelfDeliveryArea', $params);
    }
}
