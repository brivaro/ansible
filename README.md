<div align="center"><a name="readme-top"></a>
  
  <img height="200" alt="Kubernetes logo" src="https://github.com/kubernetes/kubernetes/raw/master/logo/logo.png">

# **Clúster Kubernetes en AlmaLinux 9** 🚀

[![CII Best Practices](https://bestpractices.coreinfrastructure.org/projects/569/badge)](https://bestpractices.coreinfrastructure.org/projects/569) 
[![Go Report Card](https://goreportcard.com/badge/github.com/kubernetes/kubernetes)](https://goreportcard.com/report/github.com/kubernetes/kubernetes) 
![GitHub release (latest SemVer)](https://img.shields.io/github/v/release/kubernetes/kubernetes?sort=semver)
![GitHub contributors](https://img.shields.io/github/contributors/brivaro/kubernetes-ansible?COLOR=%23FF6500)
![GitHub repo size](https://img.shields.io/github/repo-size/brivaro/kubernetes-ansible?color=%23704264)

Este repositorio contiene los **playbooks de Ansible** necesarios para automatizar la configuración de un clúster Kubernetes en AlmaLinux 9. Utilizando un nodo Ansible como orquestador, puedes configurar un nodo master y varios nodos worker sin recurrir a herramientas como Kubespray.

</div>

<details>
<summary><kbd>Table of Contents</kbd></summary>

- [Objetivo](#objetivo-)
- [Características principales](#características-principales-)
- [Requisitos](#requisitos-)
- [Estructura del repositorio](#estructura-del-repositorio-)
- [Uso](#uso-%EF%B8%8F)
- [Contribuciones](#contribuciones-)
- [Licencia](#licencia-)

</details>

---

## **Objetivo** 🎯

El objetivo de este repositorio es ofrecer una forma sencilla y automatizada para configurar un clúster Kubernetes en AlmaLinux 9 mediante Ansible, para facilitar la administración de aplicaciones en contenedores.

---

## **Características principales** 🔧

- Configuración de nodos (swap, SELinux, firewall, módulos del kernel, etc.).
- Instalación de **Containerd** y herramientas de Kubernetes (**kubeadm**, **kubelet**, **kubectl**).
- Inicialización del clúster y unión de nodos worker.
- Configuración de la red del clúster con **Calico**.

> [!IMPORTANT]
> Este repositorio está diseñado para facilitar la creación de un clúster de Kubernetes de manera eficiente. Se requiere una mínima configuración en cada nodo para ejecutar los playbooks.

---

## **Requisitos** 📋

1. **Virtualización**: Máquinas virtuales en VirtualBox o similar.
2. **Sistema Operativo**: AlmaLinux 9 Minimal en todos los nodos.
3. **Especificaciones mínimas**:
   - Nodo Ansible/Master: 2 GiB RAM, 2 vCPU.
   - Nodo Worker: 1 GiB RAM, 1 vCPU.

---

## **Estructura del repositorio** 📂

- `/discarded`: Carpeta de aspectos que he ido probando por incompatibilidad de versiones y pruebas.
- `/inicluster`: Configuración inicial de los nodos, cluster, Calico.
- `/nfs`: Instalación y configuración de **NFS**, **Metallb**, **Metrics Server**, **Deployment de la Web**.
- `/nfs/web`: Todos los documentos necesarios para la web, manifiestos...
- `inventory.ini`: Inventario de nodos para Ansible.

> [!NOTE]
> La estructura del repositorio está organizada para facilitar la gestión de cada parte del clúster por separado. Los playbooks están distribuidos de manera modular para su fácil ejecución.

---

## **Uso** ⚙️

### **1. Clonar el repositorio**
```bash
git clone https://github.com/brivaro/ansible
cd ansible
```

### **2. Configurar el inventario**
Edita el archivo `inventory.ini` con las IPs de los nodos en tu entorno.

> [!TIP]
> Asegúrate de que todos los nodos sean accesibles desde el nodo Ansible y que el puerto SSH esté abierto para poder ejecutar las tareas de Ansible.

### **3. Ejecutar los playbooks**
Sigue el orden indicado para ejecutar los playbooks:
```bash
ansible-playbook -i inventory.ini ./inicluster/1-config.yml
ansible-playbook -i inventory.ini ./inicluster/2-installation.yml
ansible-playbook -i inventory.ini ./inicluster/3-inicluster.yml
...
```

> [!IMPORTANT]
> Ejecutar los playbooks en el orden correcto es esencial para asegurar la correcta instalación de Kubernetes en el clúster. No omitas ningún paso.

### **4. Validar el clúster** ✅
Desde el nodo master:
```bash
kubectl get nodes
```
Esto te permitirá verificar que los nodos se han unido correctamente al clúster.

### **5. Verificar los Pods** 🧐
Desde el nodo master, puedes verificar el estado de los pods ejecutando:

```bash
kubectl get pods --all-namespaces
```

Este comando te mostrará todos los pods que están corriendo en tu clúster, en todos los namespaces. Así podrás verificar que los pods se están ejecutando correctamente.

> [!NOTE]
> Si quieres ver los pods de un namespace específico, puedes añadir el nombre del namespace después de `--namespace`, como por ejemplo:
> ```bash
> kubectl get pods --namespace kube-system
> ```

---

## **Contribuciones** 💡

Si deseas mejorar este proyecto o reportar problemas, por favor abre un issue o envía un pull request.

> [!NOTE]
> Asegúrate de seguir las mejores prácticas al contribuir, como escribir descripciones claras de los cambios y asegurarte de que los playbooks sigan las convenciones de Ansible.

---

## **Licencia** 📜

Este proyecto está bajo la **Licencia MIT**.