<?php

namespace NFePHP\eSocial\Factories\Traits;

trait TraitS2399
{
    /**
     * builder for version S.1.0.0
     */
    protected function toNodeS100()
    {
        $ideEmpregador = $this->node->getElementsByTagName('ideEmpregador')->item(0);
        $ideEvento = $this->dom->createElement("ideEvento");
        $this->dom->addChild(
            $ideEvento,
            "indRetif",
            $this->std->indretif,
            true
        );
        $this->dom->addChild(
            $ideEvento,
            "nrRecibo",
            ! empty($this->std->nrrecibo) ? $this->std->nrrecibo : null,
            false
        );
        $this->dom->addChild(
            $ideEvento,
            "tpAmb",
            $this->tpAmb,
            true
        );
        $this->dom->addChild(
            $ideEvento,
            "procEmi",
            $this->procEmi,
            true
        );
        $this->dom->addChild(
            $ideEvento,
            "verProc",
            $this->verProc,
            true
        );
        $this->node->insertBefore($ideEvento, $ideEmpregador);

        $ideTrabSemVinculo = $this->dom->createElement("ideTrabSemVinculo");
        $this->dom->addChild(
            $ideTrabSemVinculo,
            "cpfTrab",
            $this->std->cpftrab,
            true
        );
        $this->dom->addChild(
            $ideTrabSemVinculo,
            "matricula",
            !empty($this->std->matricula) ? $this->std->matricula : null,
            false
        );
        $this->dom->addChild(
            $ideTrabSemVinculo,
            "codCateg",
            !empty($this->std->codcateg) ? $this->std->codcateg : null,
            false
        );
        $this->node->appendChild($ideTrabSemVinculo);

        $infoTSVTermino = $this->dom->createElement("infoTSVTermino");
        $this->dom->addChild(
            $infoTSVTermino,
            "dtTerm",
            $this->std->dtterm,
            true
        );
        $this->dom->addChild(
            $infoTSVTermino,
            "mtvDesligTSV",
            !empty($this->std->mtvdesligtsv) ? $this->std->mtvdesligtsv : null,
            false
        );
        $this->dom->addChild(
            $infoTSVTermino,
            "pensAlim",
            !empty($this->std->pensalim) ? $this->std->pensalim : null,
            false
        );
        $this->dom->addChild(
            $infoTSVTermino,
            "percAliment",
            !empty($this->std->percaliment) ? $this->std->percaliment : null,
            false
        );
        $this->dom->addChild(
            $infoTSVTermino,
            "vrAlim",
            !empty($this->std->vralim) ? $this->std->vralim : null,
            false
        );
        $this->dom->addChild(
            $infoTSVTermino,
            "nrProcTrab",
            !empty($this->std->nrproctrab) ? $this->std->nrproctrab : null,
            false
        );
        if (!empty($this->std->novocpf)) {
            $mudancaCPF = $this->dom->createElement("mudancaCPF");
            $this->dom->addChild(
                $mudancaCPF,
                "novoCPF",
                $this->std->novocpf,
                true
            );
            $infoTSVTermino->appendChild($mudancaCPF);
        }

        if (!empty($this->std->verbasresc)) {
            $vr = $this->std->verbasresc;
            $verbasResc = $this->dom->createElement("verbasResc");
            foreach ($vr->dmdev as $dv) {
                $dmDev = $this->dom->createElement("dmDev");
                $this->dom->addChild(
                    $dmDev,
                    "ideDmDev",
                    $dv->idedmdev,
                    true
                );
                foreach ($dv->ideestablot as $el) {
                    $ideEstabLot = $this->dom->createElement("ideEstabLot");
                    $this->dom->addChild(
                        $ideEstabLot,
                        "tpInsc",
                        $el->tpinsc,
                        true
                    );
                    $this->dom->addChild(
                        $ideEstabLot,
                        "nrInsc",
                        $el->nrinsc,
                        true
                    );
                    $this->dom->addChild(
                        $ideEstabLot,
                        "codLotacao",
                        $el->codlotacao,
                        true
                    );
                    foreach ($el->detverbas as $dever) {
                        $detVerbas = $this->dom->createElement("detVerbas");
                        $this->dom->addChild(
                            $detVerbas,
                            "codRubr",
                            $dever->codrubr,
                            true
                        );
                        $this->dom->addChild(
                            $detVerbas,
                            "ideTabRubr",
                            $dever->idetabrubr,
                            true
                        );
                        $this->dom->addChild(
                            $detVerbas,
                            "qtdRubr",
                            !empty($dever->qtdrubr) ? $dever->qtdrubr : null,
                            false
                        );
                        $this->dom->addChild(
                            $detVerbas,
                            "fatorRubr",
                            !empty($dever->fatorrubr) ? $dever->fatorrubr : null,
                            false
                        );
                        $this->dom->addChild(
                            $detVerbas,
                            "vrRubr",
                            $dever->vrrubr,
                            true
                        );
                        $this->dom->addChild(
                            $detVerbas,
                            "indApurIR",
                            isset($dever->indapurir) ? $dever->indapurir : null,
                            false
                        );
                        $ideEstabLot->appendChild($detVerbas);
                    }

                    if (!empty($el->infosimples)) {
                        $infoSimples = $this->dom->createElement("infoSimples");
                        $this->dom->addChild(
                            $infoSimples,
                            "indSimples",
                            $el->infosimples->indsimples,
                            true
                        );
                        $ideEstabLot->appendChild($infoSimples);
                    }

                    $dmDev->appendChild($ideEstabLot);
                }

                $verbasResc->appendChild($dmDev);
            }

            if (!empty($this->std->verbasresc->procjudtrab)) {
                foreach ($this->std->verbasresc->procjudtrab as $pj) {
                    $procJudTrab = $this->dom->createElement("procJudTrab");
                    $this->dom->addChild(
                        $procJudTrab,
                        "tpTrib",
                        $pj->tptrib,
                        true
                    );
                    $this->dom->addChild(
                        $procJudTrab,
                        "nrProcJud",
                        $pj->nrprocjud,
                        true
                    );
                    $this->dom->addChild(
                        $procJudTrab,
                        "codSusp",
                        !empty($pj->codsusp) ? $pj->codsusp : null,
                        false
                    );
                    $verbasResc->appendChild($procJudTrab);
                }
            }
            if (!empty($this->std->verbasresc->infomv)) {
                $infoMV = $this->dom->createElement("infoMV");
                $this->dom->addChild(
                    $infoMV,
                    "indMV",
                    $this->std->verbasresc->infomv->indmv,
                    true
                );
                foreach ($this->std->verbasresc->infomv->remunoutrempr as $rm) {
                    $remunOutrEmpr = $this->dom->createElement("remunOutrEmpr");
                    $this->dom->addChild(
                        $remunOutrEmpr,
                        "tpInsc",
                        $rm->tpinsc,
                        true
                    );
                    $this->dom->addChild(
                        $remunOutrEmpr,
                        "nrInsc",
                        $rm->nrinsc,
                        true
                    );
                    $this->dom->addChild(
                        $remunOutrEmpr,
                        "codCateg",
                        $rm->codcateg,
                        true
                    );
                    $this->dom->addChild(
                        $remunOutrEmpr,
                        "vlrRemunOE",
                        $rm->vlrremunoe,
                        true
                    );
                    $infoMV->appendChild($remunOutrEmpr);
                }
                $verbasResc->appendChild($infoMV);
            }
            $infoTSVTermino->appendChild($verbasResc);
        }

        if (!empty($this->std->quarentena)) {
            $quarentena = $this->dom->createElement("quarentena");
            $this->dom->addChild(
                $quarentena,
                "dtFimQuar",
                $this->std->quarentena->dtfimquar,
                true
            );
            $infoTSVTermino->appendChild($quarentena);
        }

        $this->node->appendChild($infoTSVTermino);
        $this->eSocial->appendChild($this->node);
        //$this->xml = $this->dom->saveXML($this->eSocial);
        $this->sign();
    }

    /**
     * builder for version S.1.1.0
     */
    protected function toNodeS110()
    {
        $ideEmpregador = $this->node->getElementsByTagName('ideEmpregador')->item(0);
        $ideEvento = $this->dom->createElement("ideEvento");
        $this->dom->addChild(
            $ideEvento,
            "indRetif",
            $this->std->indretif,
            true
        );
        $this->dom->addChild(
            $ideEvento,
            "nrRecibo",
            ! empty($this->std->nrrecibo) ? $this->std->nrrecibo : null,
            false
        );
        $this->dom->addChild(
            $ideEvento,
            "tpAmb",
            $this->tpAmb,
            true
        );
        $this->dom->addChild(
            $ideEvento,
            "procEmi",
            $this->procEmi,
            true
        );
        $this->dom->addChild(
            $ideEvento,
            "verProc",
            $this->verProc,
            true
        );
        $this->node->insertBefore($ideEvento, $ideEmpregador);

        $ideTrabSemVinculo = $this->dom->createElement("ideTrabSemVinculo");
        $this->dom->addChild(
            $ideTrabSemVinculo,
            "cpfTrab",
            $this->std->cpftrab,
            true
        );
        $this->dom->addChild(
            $ideTrabSemVinculo,
            "matricula",
            !empty($this->std->matricula) ? $this->std->matricula : null,
            false
        );
        $this->dom->addChild(
            $ideTrabSemVinculo,
            "codCateg",
            !empty($this->std->codcateg) ? $this->std->codcateg : null,
            false
        );
        $this->node->appendChild($ideTrabSemVinculo);

        $infoTSVTermino = $this->dom->createElement("infoTSVTermino");
        $this->dom->addChild(
            $infoTSVTermino,
            "dtTerm",
            $this->std->dtterm,
            true
        );
        $this->dom->addChild(
            $infoTSVTermino,
            "mtvDesligTSV",
            !empty($this->std->mtvdesligtsv) ? $this->std->mtvdesligtsv : null,
            false
        );
        $this->dom->addChild(
            $infoTSVTermino,
            "pensAlim",
            !empty($this->std->pensalim) ? $this->std->pensalim : null,
            false
        );
        $this->dom->addChild(
            $infoTSVTermino,
            "percAliment",
            !empty($this->std->percaliment) ? $this->std->percaliment : null,
            false
        );
        $this->dom->addChild(
            $infoTSVTermino,
            "vrAlim",
            !empty($this->std->vralim) ? $this->std->vralim : null,
            false
        );
        $this->dom->addChild(
            $infoTSVTermino,
            "nrProcTrab",
            !empty($this->std->nrproctrab) ? $this->std->nrproctrab : null,
            false
        );
        if (!empty($this->std->novocpf)) {
            $mudancaCPF = $this->dom->createElement("mudancaCPF");
            $this->dom->addChild(
                $mudancaCPF,
                "novoCPF",
                $this->std->novocpf,
                true
            );
            $infoTSVTermino->appendChild($mudancaCPF);
        }

        if (!empty($this->std->verbasresc)) {
            $vr = $this->std->verbasresc;
            $verbasResc = $this->dom->createElement("verbasResc");
            foreach ($vr->dmdev as $dv) {
                $dmDev = $this->dom->createElement("dmDev");
                $this->dom->addChild(
                    $dmDev,
                    "ideDmDev",
                    $dv->idedmdev,
                    true
                );
                foreach ($dv->ideestablot as $el) {
                    $ideEstabLot = $this->dom->createElement("ideEstabLot");
                    $this->dom->addChild(
                        $ideEstabLot,
                        "tpInsc",
                        $el->tpinsc,
                        true
                    );
                    $this->dom->addChild(
                        $ideEstabLot,
                        "nrInsc",
                        $el->nrinsc,
                        true
                    );
                    $this->dom->addChild(
                        $ideEstabLot,
                        "codLotacao",
                        $el->codlotacao,
                        true
                    );
                    foreach ($el->detverbas as $dever) {
                        $detVerbas = $this->dom->createElement("detVerbas");
                        $this->dom->addChild(
                            $detVerbas,
                            "codRubr",
                            $dever->codrubr,
                            true
                        );
                        $this->dom->addChild(
                            $detVerbas,
                            "ideTabRubr",
                            $dever->idetabrubr,
                            true
                        );
                        $this->dom->addChild(
                            $detVerbas,
                            "qtdRubr",
                            !empty($dever->qtdrubr) ? $dever->qtdrubr : null,
                            false
                        );
                        $this->dom->addChild(
                            $detVerbas,
                            "fatorRubr",
                            !empty($dever->fatorrubr) ? $dever->fatorrubr : null,
                            false
                        );
                        $this->dom->addChild(
                            $detVerbas,
                            "vrRubr",
                            $dever->vrrubr,
                            true
                        );
                        $this->dom->addChild(
                            $detVerbas,
                            "indApurIR",
                            isset($dever->indapurir) ? $dever->indapurir : null,
                            false
                        );
                        $ideEstabLot->appendChild($detVerbas);
                    }

                    if (!empty($el->infosimples)) {
                        $infoSimples = $this->dom->createElement("infoSimples");
                        $this->dom->addChild(
                            $infoSimples,
                            "indSimples",
                            $el->infosimples->indsimples,
                            true
                        );
                        $ideEstabLot->appendChild($infoSimples);
                    }

                    $dmDev->appendChild($ideEstabLot);
                }

                $verbasResc->appendChild($dmDev);
            }

            if (!empty($this->std->verbasresc->procjudtrab)) {
                foreach ($this->std->verbasresc->procjudtrab as $pj) {
                    $procJudTrab = $this->dom->createElement("procJudTrab");
                    $this->dom->addChild(
                        $procJudTrab,
                        "tpTrib",
                        $pj->tptrib,
                        true
                    );
                    $this->dom->addChild(
                        $procJudTrab,
                        "nrProcJud",
                        $pj->nrprocjud,
                        true
                    );
                    $this->dom->addChild(
                        $procJudTrab,
                        "codSusp",
                        !empty($pj->codsusp) ? $pj->codsusp : null,
                        false
                    );
                    $verbasResc->appendChild($procJudTrab);
                }
            }
            if (!empty($this->std->verbasresc->infomv)) {
                $infoMV = $this->dom->createElement("infoMV");
                $this->dom->addChild(
                    $infoMV,
                    "indMV",
                    $this->std->verbasresc->infomv->indmv,
                    true
                );
                foreach ($this->std->verbasresc->infomv->remunoutrempr as $rm) {
                    $remunOutrEmpr = $this->dom->createElement("remunOutrEmpr");
                    $this->dom->addChild(
                        $remunOutrEmpr,
                        "tpInsc",
                        $rm->tpinsc,
                        true
                    );
                    $this->dom->addChild(
                        $remunOutrEmpr,
                        "nrInsc",
                        $rm->nrinsc,
                        true
                    );
                    $this->dom->addChild(
                        $remunOutrEmpr,
                        "codCateg",
                        $rm->codcateg,
                        true
                    );
                    $this->dom->addChild(
                        $remunOutrEmpr,
                        "vlrRemunOE",
                        $rm->vlrremunoe,
                        true
                    );
                    $infoMV->appendChild($remunOutrEmpr);
                }
                $verbasResc->appendChild($infoMV);
            }
            $infoTSVTermino->appendChild($verbasResc);
        }

        if (!empty($this->std->remunaposterm)) {
            $remun = $this->std->remunaposterm;
            $rat = $this->dom->createElement("remunAposTerm");
            $this->dom->addChild(
                $rat,
                "indRemun",
                $remun->indremun ?? null,
                false
            );
            $this->dom->addChild(
                $rat,
                "dtFimRemun",
                $remun->dtfimremun,
                true
            );
            $infoTSVTermino->appendChild($rat);
        }

        $this->node->appendChild($infoTSVTermino);
        $this->eSocial->appendChild($this->node);
        //$this->xml = $this->dom->saveXML($this->eSocial);
        $this->sign();
    }

    /**
     * builder for version S.1.2.0
     */
    protected function toNodeS120()
    {
        return $this->toNodeS110();
    }

    /**
     * builder for version S.1.3.0
     */
    protected function toNodeS130()
    {
        return $this->toNodeS110();
    }
}
